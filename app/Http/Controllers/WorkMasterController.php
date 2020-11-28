<?php

namespace App\Http\Controllers;

use App\WorkMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use DB;
class WorkMasterController extends Controller
{
    public function index()
    {
     $data=WorkMaster::where('WorkStatus',1)->get();
     return view('workmaster.index',compact('data'));
    }

   
    public function create()
    {
        return view('workmaster.add_workmaster');
    }

   
    public function store(Request $request)
    {
        $validateData=$request->validate([ 'FileType'=>['required','min:2','regex:/^[a-zA-Z ]+$/u'] ]);

        WorkMaster::insert([ 'WorkName'=>$request->FileType ]);

        Session::flash('message','Data Saved Successfully');
        return redirect()->action('WorkMasterController@index');
    }

    public function show(WorkMaster $workMaster)
    {
        //
    }

    public function edit($WorkId)
    {
        $data=WorkMaster::where('WorkId',$WorkId)->get();
        return view('workmaster.edit_workmaster',compact('data'));
    }

    public function update(Request $request,$WorkId)
    {
        $validateData=$request->validate(['FileType'=>['required','min:2','regex:/^[a-zA-Z ]+$/u'] ]);

        DB::table('work_master')
        ->where('WorkId',$WorkId)
        ->update([ 'WorkName'=>$request->FileType ]);

        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('WorkMasterController@index');
    }

   
    public function destroy($WorkId)
    {
        DB::table('work_master')
        ->where('WorkId',$WorkId)
        ->update(['WorkStatus'=>0]);

        Session::flash('message','Work Deleted Successfully');
        return redirect()->action('WorkMasterController@index');
    }
}