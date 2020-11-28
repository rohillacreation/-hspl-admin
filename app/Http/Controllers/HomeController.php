<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDesignationMaster;
use App\LeaveManagement;
use DB;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
         $this->ManageLeaves();
    }

    public function index()
    {   
        $data['uers'] = DB::table('users')->where('UserStatus',1)->count();
        $data['machines'] = DB::table('machine_master')->where('MachineStatus',1)->count();
        $data['engineers'] = DB::table('engineer_master')->where('EngineerStatus',1)
                             ->where('engineer_master.AssignTo', Auth()->User()->id)->count();
      $data['onleave'] = DB::table('engineer_master')->where('EngineerStatus',1)
                         ->where('engineer_master.AssignTo', Auth()->User()->id)
                         ->where('EngineerLeaveStatus',1)->count();
        $data['onsite'] = DB::table('engineer_master')->where('EngineerStatus',1)
                          ->where('engineer_master.AssignTo', Auth()->User()->id)
                          ->where('EngineerSiteStatus',1)->count();

        $data['chart'] = DB::table('engineer_on_site')
                         ->where('OnSiteStatus', 0)
                         ->groupBy('months')
                         //->orderBy('created_at', 'asc')
                         ->select(DB::raw('avg(TotalDays) as avg'),DB::raw("DATE_FORMAT(CreatedAt, '%b') as months"))
                         ->limit('12')
                         ->get();

        $data['charttotalservice'] = DB::table('service_master')
                          ->where('ServiceStatusId',5)
                          ->groupBy('months')
                          ->select(DB::raw('count(*) as count'),DB::raw("DATE_FORMAT(CreatedAt, '%b') as months"))
                          ->limit('12')
                          ->get();

         $date = date("Y-m-d",strtotime("-1 month"));
         $data['table'] = DB::table('engineer_on_site')
                         ->leftJoin('engineer_master', 'engineer_master.EngineerId', '=', 'engineer_on_site.EngineerId')
                         ->groupBy('engineer_on_site.EngineerId')
                         ->orderBy('totalDays', 'desc')
                         ->whereMonth('engineer_on_site.CreatedAt', date("m",strtotime("-1 month")))
                         ->where('engineer_on_site.OnSiteStatus', 0)
                         ->select(DB::raw('sum(engineer_on_site.TotalDays) as totalDays'),'engineer_master.EngineerName')
                         ->where('engineer_master.AssignTo', Auth()->User()->id) 
                         ->limit(5)
                         ->get();
        return view('dashboard.index',compact('data'));
    }

    public function all_users()
    {
        $data = DB::table('users')
                ->leftJoin('users_designation_master','users_designation_master.UserDesignationId', '=', 'users.UserDesignationId')
                ->where('users.UserStatus',1)
                ->orderBy('users.id', 'desc')
                ->get();//to fetch data in array form
        return view('auth.index', compact('data'));
    }

    public function edit($UserId)
    {
        $data = user::where('id', $UserId)->get();
        $data1 = UserDesignationMaster::where('UserDesignationStatus', 1)->get();
        return view('auth.edit_user', compact('data','data1'));
    }

    public function update(Request $request, $UserId)
    {
        $validatedData = $request->validate([
                                             'name' => ['required', 'string', 'max:255'],
                                             'UserLastName' => ['required', 'string', 'max:255'],
                                             'UserMobile' => ['required', 'string', 'max:255'],
                                             'UserDesignationId' => ['required', 'string', 'max:255'],
                                             'email' => ['required', 'string', 'email', 'max:255'], ]);

        DB::table('users')
        ->where('id', $UserId)
        ->update([
                  'name' => $request->name, 
                  'UserLastName' => $request->UserLastName, 
                  'UserMobile' => $request->UserMobile, 
                  'UserDesignationId' => $request->UserDesignationId, 
                  'email' => $request->email ]


    );
        
        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('HomeController@all_users');
    }

    public function delete($UserId)
    {
      DB::table('users')->where('id',$UserId)
      ->update(['UserStatus' => 0]);
      Session::flash('message', 'Delete Successfully');
      return redirect()->action('HomeController@all_users');
    }

    public function ManageLeaves()
    {
      $leavedata = DB::table('engineer_master')
      //->join('leave_management' ,'leave_management.EngineerId','=','engineer_master.EngineerId')
      //->orderBy('leave_management.LeaveId', 'desc')
      //->distinct('engineer_master.EngineerId')
      ->Where('engineer_master.EngineerLeaveStatus',1)
      ->Where('engineer_master.EngineerStatus',1)
      ->select('engineer_master.EngineerId', DB::raw("(SELECT ToDate FROM leave_management
                          WHERE leave_management.EngineerId = engineer_master.EngineerId and leave_management.LeaveStatus = 1
                        ORDER By leave_management.LeaveId desc limit 1) as ToDate"))
      ->get();
     
      $dt =Carbon::now();
      $todaydate=$dt->toDateTimeString();
      foreach($leavedata as $key)
      {
        if($todaydate > $key->ToDate)
        {
          DB::table('engineer_master')
          ->where('EngineerId', $key->EngineerId)
          ->update(['EngineerLeaveStatus' => 0]);
        }
      }

    }

}
