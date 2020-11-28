<?php

namespace App\Http\Controllers;

use App\LeaveManagement;
use App\EngineerMaster;
use App\Http\Controllers\CommonControllers;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Route;
use json;
use DateTime;

class LeaveManagementController extends Controller
{
    public function __construct(Request $request)
    {
        $this->CommonController= new CommonController;
    }
    public function index()
    {
       // $data= LeaveManagement::All();
        $data = DB::table('leave_management')
        ->join('engineer_master', 'leave_management.EngineerId', '=', 'engineer_master.EngineerId')
        ->where('engineer_master.AssignTo', Auth()->User()->id)
        ->where('leave_management.LeaveStatus', 1)
        ->orderBy('leave_management.LeaveId', 'desc')
        ->get();
        return view('leavemanagement.index',compact('data'));
    }

    public function create()
    {
        $data1= EngineerMaster::where('EngineerStatus',1)->get();
        return view('leavemanagement.add_leavemanagement',compact('data1'));
    }

    public function store(Request $request)
    {
        if($request->Source == 'Web')
        {
            $validateData=$request->validate([
                                                'EngineerId'=>['required'],
                                                'FromDate'=>['required'],
                                                'ToDate'=>['required'],
                                                'LeaveType'=>['required'], ]);
            $firstdate= $request->FromDate;
            $secondDate= $request->ToDate;

            $datetime1 = new DateTime($firstdate);
            $datetime2 = new DateTime($secondDate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $days= $days+1;

            LeaveManagement::insert(['EngineerId'=>$request->EngineerId,
                                    'FromDate'=>$request->FromDate,
                                    'ToDate'=>$request->ToDate,
                                    'TotalLeaves'=>$days,
                                    'LeaveType'=>$request->LeaveType, ]);

            Session::flash('message', 'Your Data Saved Successfully');
            DB::table('engineer_master')->where('EngineerId',$request->EngineerId)->update(['EngineerLeaveStatus'=>1]);
            return redirect()->action('LeaveManagementController@index');
        }
        else
        {
            $validator = $this->validateForm($request->data);
            if($validator->fails()){
                return $this->CommonController->errorResponse($validator->messages(), 422);
            }
            else
            {   
               $firstdate= $request->FromDate;
               $secondDate= $request->ToDate;

                $datetime1 = new DateTime($firstdate);
                $datetime2 = new DateTime($secondDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                $days= $days+1;

                DB::table('leave_management')->insert([
                    'EngineerId'=>$request->data[0]['EngineerId'],
                    'FromDate'=>$request->data[0]['FromDate'],
                    'ToDate'=>$request->data[0]['ToDate'],
                    'TotalLeaves'=>$days,
                    'LeaveType'=>$request->data[0]['LeaveType']  ]);

                DB::table('engineer_master')->where('EngineerId',$request->EngineerId)->update(['EngineerLeaveStatus'=>1]);
                return $this->CommonController->successResponse(null,' Data Saved succesfuly',200);
            }
        }
       
    }

    public function show(LeaveManagement $leaveManagement)
    {
        //
    }

    public function edit($LeaveId)
    {
        $data1 = DB::table('leave_management')
                ->join('engineer_master', 'leave_management.EngineerId', '=', 'engineer_master.EngineerId')
                ->where('leave_management.LeaveStatus', 1)
                ->where('leave_management.LeaveId', $LeaveId)
                ->get();

        $data=EngineerMaster::All();
        return view('leavemanagement.edit_leavemanagement',compact('data1','data'));        
    }

    public function update(Request $request, $LeaveId)
    {
        if($request->Source=='Web')
        {
            $validateData= $request->validate([
            'EngineerId'=>['required'],
            'FromDate'=>['required'],
            'ToDate'=>['required'],
            'LeaveType'=>['required'], ]);

            $firstdate= $request->FromDate;
            $secondDate= $request->ToDate;

            $datetime1 = new DateTime($firstdate);
            $datetime2 = new DateTime($secondDate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            $days= $days+1;

            DB::table('leave_management')->where('LeaveId',$LeaveId)->
            update([
                    'EngineerId'=>$request->EngineerId,
                    'FromDate'=>$request->FromDate,
                    'ToDate'=>$request->ToDate,
                    'LeaveType'=>$request->LeaveType,
                    'TotalLeaves'=>$days  ]);

         Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('LeaveManagementController@index');

        }
        else
        {
            $validator=$this->validateForm($request->data);
            if($validator->fails())
            {
                return $this->CommonController->errorResponse($validator->message(),422);
            }
            else
            {    

                $firstdate= $request->FromDate;
                $secondDate= $request->ToDate;

                $datetime1 = new DateTime($firstdate);
                $datetime2 = new DateTime($secondDate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');
                $days= $days+1;

                DB::table('leave_management')
                ->where('LeaveId',$LeaveId)
                ->update([
                    'EngineerId'=>$request->data[0]['EngineerId'],
                    'FromDate'=>$request->data[0]['FromDate'],
                    'ToDate'=>$request->data[0]['ToDate'],
                    'LeaveType'=>$request->data[0]['LeaveType'],
                    'TotalLeaves'=>$days  ]);
                
                 return $this->CommonController->successResponse(null,'Your Data Updated Successfully',200);

            }

        }
    }

    public function destroy($LeaveId,Request $request)
    {

         DB::table('leave_management')->where('LeaveId',$LeaveId)
         ->update(['LeaveStatus'=>0 ]);
        Session::flash('message','Your Data Deleted Successfully');
        return redirect()->action('LeaveManagementController@index');
    }

    public function rejectleave(Request $request)
    {   
        $validateData = $request->validate(['Remarks' => ['required']]);
        $abc = $request->LeaveId;

          DB::table('leave_management')
          ->where('LeaveId',$request->LeaveId)
          ->update(['Remarks'=>$request->Remarks,
                    'LeaveApproval'=> 'Disapproved' ]);

          Session::flash('message','Leave Disapproved Successfully');
          return redirect()->action('LeaveManagementController@index');
    }

    public function approval(Request $request)
    {
        if($request->LeaveApproval == 'Approved')
        {
            $data = Db::table('leave_management')
                    ->join('engineer_master', 'engineer_master.EngineerId', '=', 'leave_management.EngineerId')
                    ->where('LeaveId', $request->LeaveId)->get();
            $type = $data[0]->LeaveType;
            if($data[0]->$type < $data[0]->TotalLeaves)
            {
                return response()->json("You Don't have sufficient ".$data[0]->LeaveType." Leaves", 200) ;
            }
            DB::table('engineer_master')
            ->where('EngineerId', $data[0]->EngineerId)
            ->update([$data[0]->LeaveType => DB::raw($data[0]->LeaveType .'-'. $data[0]->TotalLeaves),
                'EngineerTotalLeaves' => DB::raw('EngineerTotalLeaves' .'-'. $data[0]->TotalLeaves)]);
            DB::table('leave_management')->where('LeaveId',$request->LeaveId)
            ->update(['LeaveApproval'=>$request->LeaveApproval ]);
        }
        else
        {
            DB::table('leave_management')->where('LeaveId',$request->LeaveId)
            ->update(['LeaveApproval'=>$request->LeaveApproval ]);
        }
        return response()->json("Status Update Successfully", 200) ;     
    }

    public function validateForm($data){
        return Validator::make($data[0] ? $data[0] : '', [
            'EngineerId'=> 'required',
            'FromDate'=> 'required',
            'ToDate'=> 'required',
            'LeaveType'=> 'required' ]);
    }


    // this function is for fetch all engineers on leave
    public function FetchallEngineerOnLeave(Request $request)
    {   
        $validator1=$this->validateuserfetch($request->data);
        if($validator1->fails())
        {
            return $this->CommonController->errorResponse($validator1->messages(),422);
        }
        else
        {   
            $EngineerLeaveData=DB::table('leave_management')
                               ->where('EngineerId',$request->data['EngineerId'])
                               ->where('leave_management.LeaveStatus', 1)->get();

            if (count($EngineerLeaveData) > 0) 
            {
                return $this->CommonController->successResponse($EngineerLeaveData,'Your Data Fetched Successfully',200);
            }

            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
        }
        
               
       
    }

    public function validateuserfetch($data)
     {
        return Validator::make($data,[
            'EngineerId'=>'required'
        ]);
     }

    //Delete Engineers On Leave

    public function DeleteEngineerOnLeave(Request $request)
    {
        $validator=$this->validateuser($request->data);
        if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(),422);
        }
        else
        {
           $countData= DB::table('leave_management')
        ->where('LeaveId',$request->data['LeaveId'])        
        ->update(['LeaveStatus'=>0]);
        if(count([$countData]) > 0)
            {
                 return $this->CommonController->successResponse(null,'Your Data Deleted Successfully',200);
            }
        else
            {
                return $this->CommonController->errorResponse('User Does not Exist',201);
            }
       
        }    
    }


     public function validateuser($data)
     {
        return Validator::make($data,[
            'LeaveId'=>'required'
        ]);
     }

}

