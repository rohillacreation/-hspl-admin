<?php

namespace App\Http\Controllers;

use App\EngineerOnSite;
use App\EngineerMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Validator;
use DB;
use Route;
use Session;
use Auth;

class EngineerOnSiteController extends Controller
{
   
    public function index()
    {
        $data=DB::table('engineer_on_site')
        ->join('engineer_master','engineer_master.EngineerId','=','engineer_on_site.EngineerId')
        ->join('service_master','service_master.EngineerId','=','engineer_on_site.EngineerId')
        ->where('engineer_master.AssignTo', Auth()->User()->id)
        ->where('engineer_master.EngineerSiteStatus',1)
        ->where('service_master.ServiceStatus',1)
        ->orderBy('engineer_on_site.OnSiteId', 'desc')
        ->get();

        return view('engineeronsite.index',compact('data'));
    }

   
    public function create()
    {
        $data1=EngineerMaster::where('EngineerStatus',1)->get();
        return view('engineeronsite.add_engineeronsite',compact('data1'));
    }

    
    public function store(Request $request)
    {
        $validateData=$request->validate([
                                          'EngineerId'=>['required'],
                                          'FromDate'=>['required'],
                                          'ToDate'=>['required']  ]);
        EngineerOnSite::insert([
                                'EngineerId'=>$request->EngineerId,
                                'FromDate'=>$request->FromDate,
                                'ToDate'=>$request->ToDate, ]);

        Session::flash('message','Data added Successfully');
        return redirect()->action('EngineerOnSiteController@index');
    }

    
    public function show(EngineerOnSite $engineerOnSite)
    {
        //
    }

    
    public function edit($OnSiteId)
    {
        $data=EngineerOnSite::where('OnSiteId',$OnSiteId)->get();
        $data1=EngineerMaster::where('EngineerStatus',1)->get();
        return view('engineeronsite.edit_engineeronsite',compact('data','data1'));
    }

    
    public function update(Request $request, $OnSiteId)
    {
        $validateData=$request->validate([
                                          'EngineerId'=>['required'],
                                          'FromDate'=>['required'],
                                          'ToDate'=>['required'] ]);

        DB::table('engineer_on_site')
        ->where('OnSiteId',$OnSiteId)
        ->Update([
                  'EngineerId'=>$request->EngineerId,
                  'FromDate'=>$request->FromDate,
                  'ToDate'=>$request->ToDate, ]);

        Session::flash('message','Data Updated Successfully');
        return redirect()->action('EngineerOnSiteController@index');
        
    }

    
    public function destroy($OnSiteId)
    {
        DB::table('engineer_on_site')
        ->where('OnSiteId',$OnSiteId)
        ->Update([ 'OnSiteStatus'=>0 ]);

        Session::flash('message','Data Deleted Successfully');
        return redirect()->action('EngineerOnSiteController@index');
        

    }
}