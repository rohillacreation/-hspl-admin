<?php

namespace App\Http\Controllers;

use App\CompanyMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Route;

class CompanyMasterController extends Controller
{
    
    public function index()
    {
        $data = CompanyMaster::All();
        return view('companymaster.index',compact('data'));
    }


    public function create()
    {
        return view('companymaster.add_detail');
    }

    
    public function store(Request $request)
    {
        $validareData=$request->validate([
                                          'CompanyName'=>['required'],
                                          'NameShown'=>['required'],
                                          'CompanyLocation'=>['required'],
                                          'CompanyCode'=>['required'],
                                          'CompanyNumber'=>['required'],
                                          'CompanyAddress'=>['required'],
                                          'GSTNumber'=>['required'] ]);

        CompanyMaster::insert([
                               'CompanyName'=>$request->CompanyName,
                               'NameShown'=>$request->NameShown,
                               'CompanyLocation'=>$request->CompanyLocation,
                               'CompanyCode'=>$request->CompanyCode,
                               'CompanyNumber'=>$request->CompanyNumber,
                               'CompanyAddress'=>$request->CompanyAddress,
                               'GSTNumber'=>$request->GSTNumber ]);

        Session::flash('message','Data Saved Successfully');
        return redirect()->action('CompanyMasterController@index');
    }

   
    public function show(CompanyMaster $companyMaster)
    {
        //
    }

    public function edit($CompanyId)
    {
        $data=CompanyMaster::where('CompanyId',$CompanyId)->get();
        return view('companymaster.edit_detail',compact('data'));
    }

    
    public function update(Request $request, $CompanyId)
    {
        $validateData=$request->validate([
                                          'CompanyName'=>['required'],
                                          'NameShown'=>['required'],
                                          'CompanyLocation'=>['required'],
                                          'CompanyCode'=>['required'],
                                          'CompanyNumber'=>['required'],
                                          'CompanyAddress'=>['required'],
                                          'GSTNumber'=>['required'] ]);

        DB::table('company_master')
        ->where('CompanyId',$CompanyId)
        ->update([
                  'CompanyName'=>$request->CompanyName,
                  'NameShown'=>$request->NameShown,
                  'CompanyLocation'=>$request->CompanyLocation,
                  'CompanyCode'=>$request->CompanyCode,
                  'CompanyNumber'=>$request->CompanyNumber,
                  'CompanyAddress'=>$request->CompanyAddress,
                  'GSTNumber'=>$request->GSTNumber ]);

        Session::flash('message','Data Update Successfully');
        return redirect()->action('CompanyMasterController@index');
    }

    public function destroy($CompanyId)
    {
        DB::table('company_master')
        ->where('CompanyId',$CompanyId)
        ->delete();

        Session::flash('message','Data Delete Successfully');
        return redirect()->action('CompanyMasterController@index');
    }
}
