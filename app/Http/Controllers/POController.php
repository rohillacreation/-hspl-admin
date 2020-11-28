<?php

namespace App\Http\Controllers;

use App\PO;
use App\RailwaysMaster;
use App\OrganisationMaster;
use App\CompanyMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Session;
use Route;
use PDF;
use Carbon;

class POController extends Controller
{
    
    public function index()
    {
        $podata = DB::table('po_table')
                  ->leftJoin('company_master','company_master.CompanyId','=','po_table.CompanyId')
                  ->leftJoin('organisation_master','organisation_master.OrganisationId','=','po_table.OrganisationId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','po_table.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','po_table.DevisionId')
                  ->select('po_table.*', 'company_master.*', 'organisation_master.*', 'railways_master.*', 'devision_master.DevisionName')
                  ->get();
        return view('PO_Bill.index',compact('podata'));
    }

    
    public function create()
    {   
        $Railways = RailwaysMaster::where('RailwaysStatus',1)->get();
        $Organisation=OrganisationMaster::where('OrganisationStatus',1)->get();
        $data=CompanyMaster::All();
        return view('PO_Bill.add_detail',compact('Railways','Organisation','data'));
    }

    
    public function store(Request $request)
    {   
        $po_number = $request->PONumber;
        $new_number = $po_number.'/'.str_replace('-', '', date('Y-m-d')).'/';
        $data1 = DB::table('po_table')->orderBy('PoId', 'desc')->first();
        if($data1)
        {
          $id = substr($data1->PONumber,-3)+1;
          $newponumber = ($new_number.( ($id < 10) ? sprintf("%03d",$id) : (($id < 100) ? sprintf("%03d",$id) : $id)));
        }
        else
        {
          $newponumber = ($new_number."001");
        }
        
        $validateData = $request->validate([
                                          'CompanyName'=>['required'],
                                          'OrganisationId'=>['required'],
                                          'Company'=>['required_if:OrganisationId,"2"'],
                                          'Address'=>['required_if:OrganisationId,"2"'],
                                          'RailwaysId'=>['required_if:OrganisationId,"1"'],
                                          'DevisionId'=>['required_if:OrganisationId,"1"'],
                                          'ReferenceNumber'=>['required'],
                                          'PODate'=>['required'],
                                          'VendorName'=>['required'],
                                          'VendorContactName'=>['required'],
                                          'VendorMobile'=>['required'],
                                          'VendorEmail'=>['required'],
                                          'GSTNumber'=>['required'],
                                          'TotalAmount'=>['required'],
                                          'TotalGstAmount'=>['required'],
                                          'GrandTotal'=>['required'],
                                          'TotalInWord'=>['required']
                                          ]);

        $CompanyId = explode("-",$request->CompanyName)[0];
        $POId = PO::insertGetId(['CompanyId'=>$CompanyId,
                                'OrganisationId'=>$request->OrganisationId,
                                'Company'=>($request->OrganisationId =='2') ? $request->Company:'',
                                'OurAddress'=>($request->OrganisationId =='2') ? $request->Address :'',
                                'RailwaysId'=>($request->OrganisationId =='1') ? $request->RailwaysId :  '',
                                'DevisionId'=>($request->OrganisationId =='1') ? $request->DevisionId :'',
                                'ReferenceNumber'=>$request->ReferenceNumber,
                                'PONumber'=>$newponumber,
                                'PODate'=>$request->PODate,
                                'PartyName'=>$request->VendorName,
                                'VendorContactName'=>$request->VendorContactName,
                                'PartyMobile'=>$request->VendorMobile,
                                'PartyEmail'=>$request->VendorEmail,
                                'gstnumber'=>$request->GSTNumber,
                                'TotalAmount'=>$request->TotalAmount,
                                'TotalGstAmount'=>$request->TotalGstAmount,
                                'GrandTotal'=>$request->GrandTotal,
                                'TotalinWords'=>$request->TotalInWord
                              ]);

        for($i = 0; $i < count($request->ItemDescription); $i++)
        {
          $data[] = [
                     'PoId'=>$POId,
                     'ItemDescription'=>$request->ItemDescription[$i],
                     'Quantity'=>$request->Quantity[$i],
                     'Rate'=>$request->Rate[$i],
                     'Unit'=>$request->Unit[$i],
                     'TotalValueWithoutGST'=>$request->TotalValueWithoutGST[$i],
                     'GST'=>$request->GST[$i],
                     'TotalValueWithGST'=>$request->TotalValueWithGST[$i]
                   ];
        }
        DB::table('product_details')->insert($data);        
        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('POController@index');

    }

    
    public function show(PO $pO)
    {
        //
    }

    
    public function edit(PO $pO)
    {
        //
    }

    
    public function update(Request $request, PO $pO)
    {
        //
    }

    public function destroy(PO $pO)
    {
        //
    }

    public function getdivision(Request $request)
    {
        $RailwaysId = $request->RailwaysId;
        return DB::table('devision_master')->where('RailwaysId', $RailwaysId)->get();
    }

    public function bill(Request $request)
    {
      $id = $request->PoId;

      $billdata = DB::table('po_table')
                  ->join('organisation_master','organisation_master.OrganisationId','=','po_table.OrganisationId')
                  ->join('company_master', 'company_master.CompanyId', '=', 'po_table.CompanyId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','po_table.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','po_table.DevisionId')
                  ->where('po_table.PoId',$id)->get();

      $product =  DB::table('po_table')
                  ->where('po_table.PoId',$id)
                  ->join('product_details','product_details.PoId','=','po_table.PoId')
                  ->select('product_details.*')
                  ->get();

      for($i = 0; $i < count($billdata); $i++)
      {
          $abc = [];
          for($j = 0; $j < count($product); $j++)
          {
              if($billdata[$i]->PoId == $product[$j]->PoId)
              {
                  array_push($abc, $product[$j]);
              }
          }
          $billdata[$i]->products = $abc;
      }
      // dd($billdata);
      return view('PO_Bill.bill_format',compact('billdata'));
    }

    public function get_POPDF($id)
    {
      $billdata = DB::table('po_table')
                  ->join('organisation_master','organisation_master.OrganisationId','=','po_table.OrganisationId')
                  ->join('company_master', 'company_master.CompanyId', '=', 'po_table.CompanyId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','po_table.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','po_table.DevisionId')
                  ->where('po_table.PoId',$id)->get();

      $ponumber = $billdata[0]->PONumber;

      $product =  DB::table('po_table')
                  ->where('po_table.PoId',$id)
                  ->join('product_details','product_details.PoId','=','po_table.PoId')
                  ->select('product_details.*')
                  ->get();

      for($i = 0; $i < count($billdata); $i++)
      {
          $abc = [];
          for($j = 0; $j < count($product); $j++)
          {
              if($billdata[$i]->PoId == $product[$j]->PoId)
              {
                  array_push($abc, $product[$j]);
              }
          }
          $billdata[$i]->products = $abc;
      }
      $pdf = PDF::loadView('PO_Bill.bill_format',compact('billdata'));



      return $pdf->download($ponumber.'.'.'pdf');
    }

    
}
