<?php

namespace App\Http\Controllers;

use App\DivisionMaster;
use App\RailwaysMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Session;
use Route;

class DivisionMasterController extends Controller
{
    
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }

    public function index()
    {   
        $data = DB::table('devision_master')
                ->join('railways_master', 'railways_master.RailwaysId', '=', 'devision_master.RailwaysId')
                ->where('devision_master.DevisionStatus',1)
                ->orderBy('devision_master.DevisionId', 'desc')
                ->get();
              
                return View('divisionmaster.index',compact('data'));
    }

   
    public function create()
    {   
        $data= RailwaysMaster::where('RailwaysStatus',1)->get();
        return View('divisionmaster.add_division_master',compact('data'));
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
                                            'RailwaysId'=>['required'],
                                            'DevisionName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255', 'unique:devision_master'],
                                            'Address'=>['required'],
                                            'GST'=>['required'] ]);

        DivisionMaster::insert(['RailwaysId'=>$request->RailwaysId,
                                'DevisionName'=>$request->DevisionName,
                                'Address'=>$request->Address,
                                'GST'=>$request->GST ]);

        Session::flash('message', 'Your Data saved Successfully');
        return redirect()->action('DivisionMasterController@index');
    }

    
    public function show(DivisionMaster $divisionMaster)
    {
        //
    }

    
    public function edit($DevisionId)
    {
        $data = DivisionMaster::where('DevisionId',$DevisionId)->get();
        $data1 = RailwaysMaster::where('RailwaysStatus',1)->get();
        return View('divisionmaster.edit_division_master',compact('data','data1'));
    }

   
    public function update(Request $request, $DevisionId)
    {
        $validateData = $request->validate([
                                           'RailwaysId'=>['required'],
                                           'DevisionName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255'],
                                           'Address'=>['required'],
                                           'GST'=>['required'] ]);

        DB::table('devision_master')
        ->where('DevisionId',$DevisionId)
        ->update([
                  'RailwaysId'=>$request->RailwaysId,
                  'DevisionName'=>$request->DevisionName,
                  'Address'=>$request->Address,
                  'GST'=>$request->GST ]);
        
        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('DivisionMasterController@index');
    }

    
    public function destroy($DevisionId)
    {
        DB::table('devision_master')->where('DevisionId',$DevisionId)
        ->update(['DevisionStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('DivisionMasterController@index');
    }

    public function FetchByDivisionId(Request $request)
    {
      $validator = $this->validateUser($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('devision_master')
            ->where('DevisionStatus', 1)
            ->where('RailwaysId', $request->data['RailwaysId'])
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
                                       'RailwaysId' => 'required']);
    }
}
