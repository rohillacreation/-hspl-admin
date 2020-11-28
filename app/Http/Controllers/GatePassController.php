<?php

namespace App\Http\Controllers;

use App\GatePass;
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

class GatePassController extends Controller
{
    
    public function index()
    {   
        $gatedata = DB::table('gate_pass_detail')
                  ->leftJoin('company_master','company_master.CompanyId','=','gate_pass_detail.CompanyId')
                  ->leftJoin('organisation_master','organisation_master.OrganisationId','=','gate_pass_detail.OrganisationId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','gate_pass_detail.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','gate_pass_detail.DevisionId')
                  ->get();

                  return view('gatepass.index',compact('gatedata'));
        
    }

    
    public function create()
    {
        $Railways = RailwaysMaster::where('RailwaysStatus',1)->get();
        $Organisation=OrganisationMaster::where('OrganisationStatus',1)->get();
        $data=CompanyMaster::All();
        return view('gatepass.add_gate_detail',compact('Railways','Organisation','data'));
    }

    
    public function store(Request $request)
    {   

        $sinumber = $request->SINumber;
        $new_number = 'C'.'/'.$sinumber.'/'.str_replace('-', '', date('Y-m-d')).'/';
        $data1 = DB::table('gate_pass_detail')->orderBy('GatePassId', 'desc')->first();
        if($data1)
        {
          $id = substr($data1->SINumber,-3)+1;
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
                                          'SINumber'=>['required'],
                                          'GatePassType'=>['required'],
                                          'PersonName'=>['required'],
                                          'VendorDesignation'=>['required'],
                                          'Department'=>['required'],
                                          'ModeofDespatch'=>['required'],
                                          'SupplyFrom'=>['required'],
                                          'SupplyTo'=>['required'],
                                          'ClientNo'=>['required'],
                                          'CC'=>['required'],
                                          'Office'=>['required'],
                                          'Consignee'=>['required'],
                                          'Date'=>['required'] ]);

       $gatepassId = GatePass::insertGetId(['CompanyId'=>$request->CompanyName,
                                            'OrganisationId'=>$request->OrganisationId,
                                            'Company'=>($request->OrganisationId =='2') ? $request->Company:'',
                                            'CompanyLocations'=>($request->OrganisationId =='2') ? $request->Address :'',
                                            'RailwaysId'=>($request->OrganisationId =='1') ? $request->RailwaysId :  '',
                                            'DevisionId'=>($request->OrganisationId =='1') ? $request->DevisionId :'',
                                            'SINumber'=>$newponumber,
                                            'GatePassType'=>$request->GatePassType,
                                            'PersonName'=>$request->PersonName,
                                            'Designation'=>$request->VendorDesignation,
                                            'Department'=>$request->Department,
                                            'ModeofDespatch'=>$request->ModeofDespatch,
                                            'SupplyFrom'=>$request->SupplyFrom,
                                            'SupplyTo'=>$request->SupplyTo,
                                            'ClientNo'=>$request->ClientNo,
                                            'CC'=>$request->CC,
                                            'Office'=>$request->Office,
                                            'Consignee'=>$request->Consignee,
                                            'Date'=>$request->Date,
                                            'TimeOut'=>$request->TimeOut,
                                            'TotalAmount'=>$request->TotalAmount ]);

        for($i = 0; $i < count($request->Descriptionofmaterial); $i++)
        {
          $data[] = [
                     'gatepassId'=>$gatepassId,
                     'Descriptionofmaterial'=>$request->Descriptionofmaterial[$i],
                     'PartNumber'=>$request->PartNumber[$i],
                     'Quantity'=>$request->Quantity[$i],
                     'UnitPrice'=>$request->UnitRate[$i],
                     'NetPrice'=>$request->NetPrice[$i],
                     'Remarks'=>$request->Remarks[$i] 
                 ];
        }

        DB::table('gate_pass_material')->insert($data);        
        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('GatePassController@index');

    }

    
    public function show(GatePass $gatePass)
    {
        //
    }

    
    public function edit(GatePass $gatePass)
    {
        //
    }

    
    public function update(Request $request, GatePass $gatePass)
    {
        //
    }

    
    public function destroy(GatePass $gatePass)
    {
        //
    }

    public function getdivision(Request $request)
    {
        $RailwaysId = $request->RailwaysId;
        return DB::table('devision_master')->where('RailwaysId', $RailwaysId)->get();
    }

    public function viewpass(Request $request)
    {
      $id = $request->GatePassId;

      $passdata = DB::table('gate_pass_detail')
                  ->join('organisation_master','organisation_master.OrganisationId','=','gate_pass_detail.OrganisationId')
                  ->join('company_master', 'company_master.CompanyId', '=', 'gate_pass_detail.CompanyId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','gate_pass_detail.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','gate_pass_detail.DevisionId')
                  ->where('gate_pass_detail.GatePassId',$id)->get();

      $product =  DB::table('gate_pass_detail')
                  ->where('gate_pass_detail.GatePassId',$id)
                  ->join('gate_pass_material','gate_pass_material.GatePassId','=','gate_pass_detail.GatePassId')
                  ->select('gate_pass_material.*')
                  ->get();

      for($i = 0; $i < count($passdata); $i++)
      {
          $abc = [];
          for($j = 0; $j < count($product); $j++)
          {
              if($passdata[$i]->GatePassId == $product[$j]->GatePassId)
              {
                  array_push($abc, $product[$j]);
              }
          }
          $passdata[$i]->products = $abc;
      }
      
      return view('gatepass.gatepass_format',compact('passdata'));
    }

    public function get_POPDF($id)
    {
      $passdata = DB::table('gate_pass_detail')
                  ->join('organisation_master','organisation_master.OrganisationId','=','gate_pass_detail.OrganisationId')
                  ->join('company_master', 'company_master.CompanyId', '=', 'gate_pass_detail.CompanyId')
                  ->leftJoin('railways_master','railways_master.RailwaysId','=','gate_pass_detail.RailwaysId')
                  ->leftJoin('devision_master','devision_master.DevisionId','=','gate_pass_detail.DevisionId')
                  ->where('gate_pass_detail.GatePassId',$id)->get();

      $SINumber = $passdata[0]->SINumber;

      $product =  DB::table('gate_pass_detail')
                  ->where('gate_pass_detail.GatePassId',$id)
                  ->join('gate_pass_material','gate_pass_material.GatePassId','=','gate_pass_detail.GatePassId')
                  ->select('gate_pass_material.*')
                  ->get();

      for($i = 0; $i < count($passdata); $i++)
      {
          $abc = [];
          for($j = 0; $j < count($product); $j++)
          {
              if($passdata[$i]->GatePassId == $product[$j]->GatePassId)
              {
                  array_push($abc, $product[$j]);
              }
          }
          $passdata[$i]->products = $abc;
      }
      $pdf = PDF::loadView('gatepass.gatepass_format',compact('passdata'));
      return $pdf->download($SINumber.'.'.'pdf');
    }
}
