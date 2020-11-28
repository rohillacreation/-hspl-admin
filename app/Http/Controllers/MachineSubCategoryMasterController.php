<?php

namespace App\Http\Controllers;

use App\MachineSubCategoryMaster;
use App\MachineCategoryMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Session;
use Route;

class MachineSubCategoryMasterController extends Controller
{   

    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }
   
    public function index()
    {   
         $data = DB::table('machine_subcategory_master')
                 ->join('machine_category_master', 'machine_category_master.MachineCategoryId', '=', 'machine_subcategory_master.MachineCategoryId')
                 ->where('machine_subcategory_master.MachineSubcategoryStatus',1)
                 ->orderBy('machine_subcategory_master.MachineSubcategoryId', 'desc')
                 ->get();
         
         return view('machinesubcategorymaster.index',compact('data'));
    }

    
    public function create()
    {   
        $data = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        return view('machinesubcategorymaster.add_machine_subcategory_master',compact('data'));
    }

   
    public function store(Request $request)
    {
        $validateData = $request->validate([
                            'MachineType'=>['required'],
                            'MachineSubcategoryName'=>['required', 'max:25'] ]);
        //,'regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255', 'unique:machine_subcategory_master'

        MachineSubCategoryMaster::insert(['MachineCategoryId'=>$request->MachineType,
                                          'MachineSubcategoryName'=>$request->MachineSubcategoryName ]);

        Session::flash('message', 'Your Data saved Successfully');
        return redirect()->action('MachineSubCategoryMasterController@index');
    }

    
    public function show(MachineSubCategoryMaster $machineSubCategoryMaster)
    {
        //
    }

   
    public function edit($MachineSubcategoryId)
    {   
        $data = MachineSubCategoryMaster::where('MachineSubcategoryId',$MachineSubcategoryId)->get();
        $data1 = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        return view('machinesubcategorymaster.edit_machine_subcategory_master',compact('data','data1'));
    }

    
    public function update(Request $request, $MachineSubcategoryId)
    {
        $validateData = $request->validate([
                                           'MachineType'=>['required'],
                                           'MachineSubcategoryName'=>['required', 'max:25'] ]);

        DB::table('machine_subcategory_master')
        ->where('MachineSubcategoryId',$MachineSubcategoryId)
        ->update([
                  'MachineCategoryId'=>$request->MachineType,
                  'MachineSubcategoryName'=>$request->MachineSubcategoryName ]);
        
        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('MachineSubCategoryMasterController@index');
    }

    
    public function destroy($MachineSubcategoryId)
    {
        DB::table('machine_subcategory_master')->where('MachineSubcategoryId',$MachineSubcategoryId)
        ->update(['MachineSubcategoryStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('MachineSubCategoryMasterController@index');
    }

    public function FetchByMachineCategoryId(Request $request)
    {
      $validator = $this->validateUser($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('machine_subcategory_master')
            ->where('MachineSubcategoryStatus', 1)
            ->where('MachineCategoryId', $request->data['MachineCategoryId'])
            ->get();
            if(count($data) > 0)
            
            { 
                return $this->CommonController->successResponse($data,'Data Fetch Successfully',200);
                
            }
            else
            {
                return $this->CommonController->errorResponse('User Does Not Exist', 201);
            }
      }

    }
    public function validateUser($data)
    
    {
        return Validator::make($data, [
                                       'MachineCategoryId' => 'required']);
    }
}
