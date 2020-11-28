<?php

namespace App\Http\Controllers;

use App\RailwaysMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Session;
use Route;

class RailwaysMasterController extends Controller
{
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }

    public function index()
    {
        $data=RailwaysMaster::where('RailwaysStatus',1)->get();
        return view('railwaysmaster.index',compact('data'));
    }

   
    public function create()
    {
        return view('railwaysmaster.add_railways_master');
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
                                            'RailwaysZone'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255','unique:railways_master'],
                                            'RailwaysCode'=>['required','string','max:255','unique:railways_master'],
                                            'RailwaysZoneHeadQuater'=>['required','regex:/^[a-zA-Z,() ]*$/','min:2','max:255','unique:railways_master'],
                                           ]);

        RailwaysMaster::insert([
                                'RailwaysZone'=>$request->RailwaysZone,
                                'RailwaysCode'=>$request->RailwaysCode,
                                'RailwaysZoneHeadQuater'=>$request->RailwaysZoneHeadQuater ]);

        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('RailwaysMasterController@index');
    }

    
    public function show(RailwaysMaster $railwaysMaster)
    {
        //
    }

    
    public function edit($RailwaysId)
    {
        $data = RailwaysMaster::where('RailwaysId',$RailwaysId)->get();
        return view('railwaysmaster.edit_railways_master',compact('data'));
    }

    
    public function update(Request $request, $RailwaysId)
    {
        $validateData = $request->validate([
                                            'RailwaysZone'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255'],
                                            'RailwaysCode'=>['required','string','max:255'],
                                            'RailwaysZoneHeadQuater'=>['required','regex:/^[a-zA-Z,() ]*$/','min:2','max:255'] ]);

        DB::table('railways_master')
        ->where('RailwaysId',$RailwaysId)
        ->update([
                  'RailwaysZone'=>$request->RailwaysZone,
                  'RailwaysCode'=>$request->RailwaysCode,
                  'RailwaysZoneHeadQuater'=>$request->RailwaysZoneHeadQuater ]);

        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('RailwaysMasterController@index');


    }

   
    public function destroy($RailwaysId)
    {
        DB::table('railways_master')->where('RailwaysId',$RailwaysId)
        ->update(['RailwaysStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('RailwaysMasterController@index');
    }

   /* public function get_division(Request $request)
    {
        $RailwaysId = $request->RailwaysId;
        return DB::table('devision_master')->where('RailwaysId', $RailwaysId)->get();
    }*/

     public function FetchAllRailway()
    {
        $railwaycount=RailwaysMaster::All()->where('RailwaysStatus',1);
        return $this->CommonController->successResponse($railwaycount,'Your Data Fetched Successfully',200);
    }
}
