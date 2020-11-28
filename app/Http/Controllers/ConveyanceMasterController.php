<?php

namespace App\Http\Controllers;

use App\ConveyanceMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Route;


class ConveyanceMasterController extends Controller
{   
     public function __construct(Request $request)
    {    
        $this->CommonController = new CommonController();
    }

    public function index()
    {
        $data=ConveyanceMaster::where('ConveyanceStatus',1)->get();
        return view('conveyancemaster.index',compact('data'));
    }
    
    public function create()
    {
        return view('conveyancemaster.add_conveyancemaster');
    }

   //'regex:/^(\d[1-9]{2})([-]{1})(\d[1-9]{3})$/']    
    public function store(Request $request)
    {
        $validareData=$request->validate([
                                            'KMRange'=>['required'],
                                            'ConveyanceAllowance'=>['required','integer','min:1'] ]);

        ConveyanceMaster::insert([
                                  'KMRange'=>$request->KMRange,
                                  'ConveyanceAllowance'=>$request->ConveyanceAllowance ]);
        Session::flash('message','Data Saved Successfully');
        return redirect()->action('ConveyanceMasterController@index');
    }

    public function show(ConveyanceMaster $conveyanceMaster)
    {
        //
    }

    public function edit($ConveyanceId)
    {
        $data=ConveyanceMaster::where('ConveyanceId',$ConveyanceId)->get();
        return view('conveyancemaster.edit_conveyancemaster',compact('data'));
    }

    
    public function update(Request $request, $ConveyanceId)
    {
        $validateData=$request->validate([
                                            'KMRange'=>['required','string','min:1'],
                                            'ConveyanceAllowance'=>['required','integer','min:1'] ]);

        DB::table('conveyance_master')
        ->where('ConveyanceId',$ConveyanceId)
        ->update([
                    'KMRange'=>$request->KMRange,
                    'ConveyanceAllowance'=>$request->ConveyanceAllowance ]);

        Session::flash('messaage','Data Updated Successfully');
        return redirect()->action('ConveyanceMasterController@index');
    }

    
    public function destroy($ConveyanceId)
    {
        DB::table('conveyance_master')
        ->where('ConveyanceId',$ConveyanceId)
        ->update(['ConveyanceStatus'=>0, ]);
        Session::flash('messaage','Data Deleted Successfully');
        return redirect()->action('ConveyanceMasterController@index');
    }

    //this  api function is for fetching all conveyance details
    public function  fetchAllConveyance()
    {
        $ConveyanceData=ConveyanceMaster::where('ConveyanceStatus',1)->get();
        return $this->CommonController->successResponse($ConveyanceData,'Your Data Fetched Successfully',200);
    }
}