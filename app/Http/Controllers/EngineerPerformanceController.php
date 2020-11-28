<?php

namespace App\Http\Controllers;

use App\EngineerPerformance;
use App\EngineerMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use DB;
use Auth;

class EngineerPerformanceController extends Controller
{
   
   // public function __construct(Request $request)
   // {
   //   $this->CommonController->new CommonController();
   // }

    public function index()
    {
        $abc = DB::table('engineer_performance') 
                    ->join('engineer_master' ,'engineer_performance.EngineerId', '=','engineer_master.EngineerId')
                    ->where('engineer_master.AssignTo', Auth()->User()->id)
                    ->get();  
                    
        $data = [];
        foreach($abc as $key)
        {
            $data[$key->EngineerId] = $key;
        }
        return view('EngineerPerformance.index',compact('data'));
    }

   
    public function create()
    {
         $data = EngineerMaster::where('EngineerStatus',1)->get();
         // dd($data);
         return view('EngineerPerformance.addengineerperformance',compact('data'));
    }

   
    public function store(Request $request)
    {
        $validatePerformancedata = $request->validate([
                                                        'EngineerId'=>['required'],
                                                        'MachineDependent'=>['required'],
                                                        'ReviewPoints'=>['required'],
                                                        'Punctuality'=>['required'],
                                                        'Feedback'=>['required']
                                    ]);
        EngineerPerformance::insert(['EngineerId' => $request->EngineerId,
                                'MachineDependent' => $request->MachineDependent,
                                'ReviewPoints' => $request->ReviewPoints,
                                'Punctuality' => $request->Punctuality,
                                'Feedback' => $request->Feedback,
                                 ]);
         Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('EngineerPerformanceController@index');


    }

    
    public function show(EngineerPerformance $engineerPerformance)
    {
        //
    }

    
    public function edit($PerformanceId)
    {

        $performancedetails = DB::table('engineer_performance')
                    ->join('engineer_master' ,'engineer_master.EngineerId', '=','engineer_performance.EngineerId')
                    ->where('PerformanceId',$PerformanceId)
                    ->get();

        return view('EngineerPerformance.editengineerperformance',compact('performancedetails'));
    }

    
    public function update(Request $request, EngineerPerformance $engineerPerformance)
    {
         $validatePerformancedata = $request->validate([
                                                        'EngineerId'=>['required'],
                                                        'MachineDependent'=>['required'],
                                                        'ReviewPoints'=>['required'],
                                                        'Punctuality'=>['required'],
                                                        'Feedback'=>['required']
                                    ]);
        EngineerPerformance::insert(['EngineerId' => $request->EngineerId,
                                'MachineDependent' => $request->MachineDependent,
                                'ReviewPoints' => $request->ReviewPoints,
                                'Punctuality' => $request->Punctuality,
                                'Feedback' => $request->Feedback,
                                 ]);
         Session::flash('message', 'Your Data Updated Successfully');
        return redirect()->action('EngineerPerformanceController@index');

        
    }

   
    public function destroy($PerformanceId)
    {
        EngineerPerformance::where('PerformanceId',$PerformanceId)
                            ->delete();

        Session::flash('message', 'Your Data deleted Successfully');
        return redirect()->action('EngineerPerformanceController@index');

    }
}
