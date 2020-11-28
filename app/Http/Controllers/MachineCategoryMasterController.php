<?php

namespace App\Http\Controllers;

use App\MachineCategoryMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Session;
use Route;

class MachineCategoryMasterController extends Controller
{   
     public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }
    
    public function index()
    {   
        $data = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        return view('machinecategorymaster.index', compact('data'));
    }

    
    public function create()
    {
        return view('machinecategorymaster.add_machine_category_master');
    }

    
    public function store(Request $request)
    {
        $validatedata=$request->validate([
                                         'MachineType'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255'],
                                         ]);

        MachineCategoryMaster::insert(['MachineCategoryName'=>$request->MachineType]);
        
        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('MachineCategoryMasterController@index');
    }

    
    public function show(MachineCategoryMaster $machineCategoryMaster)
    {
        //
    }

    
    public function edit($MachineCategoryId)
    {   
        $data = MachineCategoryMaster::where('MachineCategoryId',$MachineCategoryId)->get();
        return view('machinecategorymaster.edit_machine_category_master',compact('data'));
    }

   
    public function update(Request $request, $MachineCategoryId)
    {
        $validatedata = $request->validate([
                                    'MachineType'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255'], ]);

        DB::table('machine_category_master')
        ->where('MachineCategoryId',$MachineCategoryId)
        ->update(['MachineCategoryName'=>$request->MachineType]);

        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('MachineCategoryMasterController@index');

    }

    
    public function destroy($MachineCategoryId)
    {
        DB::table('machine_category_master')
        ->where('MachineCategoryId',$MachineCategoryId)
        ->update(['MachineCategoryStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('MachineCategoryMasterController@index');
    }

    public function FetchAllMachineCategory(Request $request)
    {
        $Machinecategory = MachineCategoryMaster::All()->where('MachineCategoryStatus',1);
        return $this->CommonController->successResponse($Machinecategory,'Data Fetch Successfully',200); 
    }
}
