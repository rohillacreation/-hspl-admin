<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Route;
use PDF;
use Auth;

class ReportsController extends Controller
{
     public function index()
    {   
        $data = DB::table('service_master')
                ->leftJoin('engineer_master','engineer_master.EngineerId','=','service_master.EngineerId')
                ->where('engineer_master.AssignTo', Auth()->User()->id)
                ->leftJoin('service_details','service_details.ServiceId','=','service_master.ServiceId')
                ->whereIn('service_master.ServiceStatusId',['4','5','6'])
                ->get();

                return view('reports.index', compact('data'));
    }

    public function reports(Request $request)
    {
      $reportsdata = $this->format_data($request->ServiceId);
      return view('reports.reports_format',compact('reportsdata'));

    }

    public function reportspdffiles($id)
    {
      $reportsdata = $this->format_data($id);
      $pdf = PDF::loadView('reports.reports_format',compact('reportsdata'));

      $imagename = substr(str_replace(" ", "", microtime()),2).'.pdf';
      $destinationPath = public_path('/images/Report/');
      $pdf->save($destinationPath . $imagename);
      //return $imagename;
      return $pdf->download('Report.pdf');
    }


    function format_data($id)
    {
      $reportsdata = DB::table('service_master')
                    ->leftJoin('engineer_master','engineer_master.EngineerId','=','service_master.EngineerId')
                    ->leftJoin('service_details','service_details.ServiceId','=','service_master.ServiceId')
                    ->leftJoin('machine_master','machine_master.MachineId','=','service_master.MachineId')
                    ->leftJoin('machine_category_master','machine_category_master.MachineCategoryId','=','machine_master.MachineCategoryId')
                    //->whereIn('service_master.ServiceStatusId',['5','6'])
                    ->where('service_master.ServiceId',$id)->get();

      $work_detail =  DB::table('service_master')
                      ->where('service_master.ServiceId',$id)
                      ->join('service_work_detail','service_work_detail.ServiceId','=','service_master.ServiceId')
                      ->select('service_work_detail.*')
                      ->get();

      $travel_detail =  DB::table('service_master')
                        ->where('service_master.ServiceId',$id)
                        ->join('travelling_details','travelling_details.ServiceId','=','service_master.ServiceId')
                        ->select('travelling_details.*')
                        ->get();
      for($i = 0; $i < count($reportsdata); $i++)
      {
          $abc = []; $def = [];
          for($j = 0; $j < count($work_detail); $j++)
          {
              if($reportsdata[$i]->ServiceId == $work_detail[$j]->ServiceId)
              {
                  array_push($abc, $work_detail[$j]);
              }
          }

          for($k = 0; $k < count($travel_detail); $k++)
          {
              if($reportsdata[$i]->ServiceId == $travel_detail[$k]->ServiceId)
              {
                  array_push($def, $travel_detail[$k]);
              }
          }
          $reportsdata[$i]->travel_details = $def;
          $reportsdata[$i]->work_details = $abc;
      }
      return $reportsdata;
    }
 }
