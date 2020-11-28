<?php

namespace App\Http\Controllers;

use App\MachineMaster;
use App\RailwaysMaster;
use App\DivisionMaster;
use App\MachineCategoryMaster;
use App\MachineSubCategoryMaster;
use App\OrganisationMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
use Route;

class MachineMasterController extends Controller
{   

    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }
    
    public function index()
    {   
         $data = DB::table('machine_master')
                 ->leftJoin('machine_category_master', 'machine_category_master.MachineCategoryId', '=', 
                    'machine_master.MachineCategoryId')
                 ->leftJoin('machine_subcategory_master', 'machine_subcategory_master.MachineSubcategoryId', '=', 
                    'machine_master.MachineSubcategoryId')
                 ->leftJoin('railways_master', 'railways_master.RailwaysId', '=', 
                    'machine_master.RailwaysId')
                 ->leftJoin('devision_master', 'devision_master.DevisionId', '=', 
                    'machine_master.DevisionId')
                 ->leftJoin('organisation_master', 'organisation_master.OrganisationId', '=', 'machine_master.OrganisationId')
                 ->where('machine_master.MachineStatus',1)
                 ->orderBy('machine_master.MachineId', 'desc')
                 ->get();
        

        return view('machinemaster.index',compact('data'));
    }

   
    public function create()
    {   
        $MachineCategory = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        $Railways = RailwaysMaster::where('RailwaysStatus',1)->get();
        $Organisation=OrganisationMaster::where('OrganisationStatus',1)->get();
        return view('machinemaster.add_machine_master',compact('MachineCategory', 'Railways', 'Organisation'));
    }
   
    public function store(Request $request)
    {   

         $validateData = $request->validate([
                                          'OrganisationId'=>['required'],
                                          'CompanyName'=>['required_if:OrganisationId,"2"'],
                                          'CompanyLocation'=>['required_if:OrganisationId,"2"'],
                                          'RailwaysId'=>['required_if:OrganisationId,"1"'],
                                          'DevisionId'=>['required_if:OrganisationId,"1"'],
                                          'MachineType'=>['required'],
                                          'MachineSubcategoryId'=>['required'],
                                          'ClientName'=>['required','string','max:255'],
                                          'MachineName'=>['required','string','max:255'],
                                          'MachineSerialNumber'=>['required','string','max:255','unique:machine_master'],
                                          'MachineOrderNo'=>['required','string','max:255'],
                                          'MachineWarranty'=>['required'],
                                          'MachineWarrantyFrom'=>['required_if:MachineWarranty,"W"'],
                                          'MachineWarrantyTo'=>['required_if:MachineWarranty,"W"'],
                                          'MachineAllotmentDate'=>['required'],
                                          ]);
        MachineMaster::insert([
                                'OrganisationId'=>$request->OrganisationId,
                                'Company'=>($request->OrganisationId =='2') ? $request->CompanyName:'',
                                'CompanyLocation'=>($request->OrganisationId =='2') ? $request->CompanyLocation :'',
                                'RailwaysId'=>($request->OrganisationId =='1') ? $request->RailwaysId :  '',
                                'DevisionId'=>($request->OrganisationId =='1') ? $request->DevisionId :'',
                                'MachineCategoryId'=>$request->MachineType,
                                'MachineSubcategoryId'=>$request->MachineSubcategoryId,
                                'ClientName'=>$request->ClientName,
                                'MachineName'=>$request->MachineName,
                                'MachineSerialNumber'=>$request->MachineSerialNumber,
                                'MachineOrderNo'=>$request->MachineOrderNo,
                                'MachineWarranty'=>$request->MachineWarranty,
                                'MachineWarrantyFrom'=> ($request->MachineWarranty == 'W') ? $request->MachineWarrantyFrom : '',
                                'MachineWarrantyTo'=> ($request->MachineWarranty == 'W') ? $request->MachineWarrantyTo : '',
                                'MachineAllotmentDate'=>$request->MachineAllotmentDate,
                                
                              ]);
        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('MachineMasterController@index');

    }

    
    public function show(MachineMaster $machineMaster)
    {
        //
    }

    
    public function edit($MachineId)
    {
        $data = MachineMaster::where('MachineId',$MachineId)->get();
        $MachineCategory = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        $Railways = RailwaysMaster::where('RailwaysStatus',1)->get();
        $Organisation  = OrganisationMaster::where('OrganisationStatus',1)->get();
        return view('machinemaster.edit_machine_master',compact('data','MachineCategory','Railways','Organisation'));

    }

    
    public function update(Request $request, $MachineId)
    {
        $validateData = $request->validate([
                                          'OrganisationId'=>['required'],
                                          'CompanyName'=>['required_if:OrganisationId,"2"'],
                                          'CompanyLocation'=>['required_if:OrganisationId,"2"'],
                                          'RailwaysId'=>['required_if:OrganisationId,"1"'],
                                          'DevisionId'=>['required_if:OrganisationId,"1"'],
                                          'MachineType'=>['required'],
                                          'MachineSubcategoryId'=>['required'],
                                          'ClientName'=>['required','string','max:255'],
                                          'MachineName'=>['required','string','max:255'],
                                          'MachineSerialNumber'=>['required','string','max:255'],
                                          'MachineOrderNo'=>['required','string','max:255'],
                                          'MachineWarranty'=>['required'],
                                          'MachineWarrantyFrom'=>['required_if:MachineWarranty,"W"'],
                                          'MachineWarrantyTo'=>['required_if:MachineWarranty,"W"'],
                                          'MachineAllotmentDate'=>['required'],

                                          ]);

          
          DB::table('machine_master')->where('MachineId',$MachineId)
          ->update([
                    'OrganisationId'=>$request->OrganisationId,
                    'Company'=>($request->OrganisationId=='2')? $request->CompanyName:'',
                    'CompanyLocation'=>($request->OrganisationId=='2')? $request->CompanyLocation:'',
                    'RailwaysId'=>($request->OrganisationId =='1') ? $request->RailwaysId :  '',
                    'DevisionId'=>($request->OrganisationId =='1') ? $request->DevisionId :  '',
                    'MachineCategoryId'=>$request->MachineType,
                    'MachineSubcategoryId'=>$request->MachineSubcategoryId,
                    'ClientName'=>$request->ClientName,
                    'MachineName'=>$request->MachineName,
                    'MachineSerialNumber'=>$request->MachineSerialNumber,
                    'MachineOrderNo'=>$request->MachineOrderNo,
                    'MachineWarranty'=>$request->MachineWarranty,
                    'MachineWarrantyFrom'=> ($request->MachineWarranty == 'W') ? $request->MachineWarrantyFrom : '',
                    'MachineWarrantyTo'=> ($request->MachineWarranty == 'W') ? $request->MachineWarrantyTo : '',
                    'MachineAllotmentDate'=>$request->MachineAllotmentDate, ]);

       Session::flash('message', 'Your Data update Successfully');
       return redirect()->action('MachineMasterController@index');

    }

   
    public function destroy($MachineId)
    {
        DB::table('machine_master')
        ->where('MachineId',$MachineId)
        ->update(['MachineStatus'=>0]);
        Session::flash('message','Data Deleted Successfully');
        return redirect()->action('MachineMasterController@index');

    }

    //ajax method 
    public function getsubcategory(Request $request)
    {
      $category_id = $request->category_id;
      return DB::table('machine_subcategory_master')->where('MachineCategoryId', $category_id)->get();
    }

     public function get_division(Request $request)
    {
        $RailwaysId = $request->RailwaysId;
        return DB::table('devision_master')->where('RailwaysId', $RailwaysId)->get();
    }

    //APIs
    public function FetchMachineData(Request $request)
    {
      
          $validatorcategory=$this->validatecategory($request->data);

        if($validatorcategory->fails())
        {
            return $this->CommonController->errorResponse($validatorcategory->messages(), 422);
        }
        else
        {
          if($request->data['type']=='machine category')
          {
            $MachineCategory=  DB::table('machine_master')
            ->where('MachineStatus',1)
            ->where('MachineCategoryId',$request->data['MachineCategoryId'])
            ->get();
                 if(count($MachineCategory) > 0)
                {
                    return $this->CommonController->successResponse($MachineCategory,'Your Data Fetched Successfully',200);
                }
                else
                {
                    return $this->CommonController->errorResponse('No Data Found',422);
                }
        }
        elseif($request->data['type']=='machine subcategory') 
          {
            $MachineSubcategory = DB::table('machine_master')
            ->where('MachineStatus',1)
            ->where('MachineSubcategoryId',$request->data['MachineSubcategoryId'])
            ->get();

            if(count($MachineSubcategory) > 0)
            {
              return $this->CommonController->successResponse($MachineSubcategory,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
        
        elseif($request->data['type']=='railways') 
          {
            $Railways = DB::table('machine_master')
            ->where('MachineStatus',1)
            ->where('RailwaysId',$request->data['RailwaysId'])
            ->get();

            if(count($Railways) > 0)
            {
              return $this->CommonController->successResponse($Railways,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
          elseif($request->data['type']=='devision') 
          {
            $Division = DB::table('machine_master')
            ->where('MachineStatus',1)
            ->where('DevisionId',$request->data['DevisionId'])
            ->get();

            if(count($Division) > 0)
            {
              return $this->CommonController->successResponse($Division,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
          elseif($request->data['type']=='machine') 
          {
            $Machine = DB::table('machine_master')
                      ->leftJoin('machine_category_master','machine_category_master.MachineCategoryId', '=', 'machine_master.MachineCategoryId')
                      ->leftJoin('machine_subcategory_master','machine_subcategory_master.MachineSubcategoryId', '=', 'machine_master.MachineSubcategoryId')
                      ->leftJoin('railways_master','railways_master.RailwaysId','=','machine_master.RailwaysId')
                      ->leftJoin('devision_master','devision_master.DevisionId','=','machine_master.DevisionId')
                      ->leftJoin('catalog_master','catalog_master.MachineId', '=', 'machine_master.MachineId')
                      ->leftJoin('technical_description','technical_description.MachineId', '=', 'machine_master.MachineId')
                      ->where('MachineStatus',1)
                      ->where('machine_master.MachineId',$request->data['MachineId'])
                      ->get();

            if(count($Machine) > 0)
            {
              return $this->CommonController->successResponse($Machine,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
          
          else
          {
            return $this->CommonController->errorResponse('type Mismatch',422);
          }
        }
    }


        public function validatecategory($data)
        
        {
            return Validator::make($data, [
                                           'type' => 'required',
                                           'MachineCategoryId' => 'required_if:type,"machine category"',
                                           'MachineSubcategoryId' => 'required_if:type,"machine subcategory"',
                                           'RailwaysId' => 'required_if:type,"Railways"',
                                           'DevisionId' => 'required_if:type,"devision"',
                                           'MachineId' => 'required_if:type,"machine"' ]);
        }

        
    }
