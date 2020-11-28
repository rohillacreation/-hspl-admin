<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\view;
//use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $abc = DB::table('leave_management')
             ->leftJoin('engineer_master','engineer_master.EngineerId', '=', 'leave_management.EngineerId')
             ->where('LeaveApproval','Pending')
             ->where('LeaveStatus',1)
             ->where('notifications', 0)
             //->where('engineer_master.AssignTo', Auth()->User()->id)
             ->whereDate('leave_management.CreatedAt', '<=', Carbon::today()->subDays( 2 ))
             ->whereDate('leave_management.CreatedAt', '!=', Carbon::today())
             ->get();
        view::share('abc',$abc);
    }
}
