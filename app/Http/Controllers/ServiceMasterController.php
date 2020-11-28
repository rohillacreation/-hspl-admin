<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\MachineCategoryMaster;
use App\MachineSubCategoryMaster;
use App\MachineMaster;
use App\RailwaysMaster;
use App\DivisionMaster;
use App\ServiceMaster;
use App\EngineerMaster;
use App\EngineerOnSite;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ReportsController;
 // use App\Http\Controllers\DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use File;
use Carbon;
use DateTime;
use PDF;
use Auth;


class ServiceMasterController extends Controller
{
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
        $this->ReportsController = new ReportsController();
    }

    //  public function __construct(Request $request)
    // {     
        
    // }
    public function index()
    {   
        $service=DB::table('service_master')
        ->leftJoin('engineer_master', 'engineer_master.EngineerId', '=', 'service_master.EngineerId')
        ->select('service_master.*','engineer_master.EngineerId', 'engineer_master.EngineerName')
        ->where('service_master.ServiceStatus',1)
        ->orderBy('service_master.ServiceId', 'desc')
        ->get(); 
        return view('servicemaster.index',compact('service'));
    }

    
    public function create()
    {
        $Machines = MachineMaster::where('MachineStatus',1)->get();
        return view('servicemaster.add_service_master',compact('Machines'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                            'MachineSerialNumber' => ['required'],
                                            'ServiceLocation' => ['required'],
                                            'LetterReceivingDate' => ['required'],
                                            'ServiceLetter' => ['required','mimes:pdf','max:10240'],
                                            'Remark' => ['required'],
                                            ]);

        $machine = DB::table('machine_master')
                   ->join('organisation_master', 'organisation_master.OrganisationId', '=', 'machine_master.OrganisationId')
                   ->leftJoin('railways_master', 'railways_master.RailwaysId', '=', 'machine_master.RailwaysId')
                   ->leftJoin('devision_master', 'devision_master.DevisionId', '=', 'machine_master.DevisionId')
                   ->where('machine_master.MachineSerialNumber', $request->MachineSerialNumber)
                   ->get();
        
        if(count($machine) < 1)
        {
          Session::flash('message', 'This machine serial no. is not correct');
          return redirect()->action('ServiceMasterController@create');
        }
        if($machine[0]->RailwaysId)
        {
           $ra = $machine[0]->RailwaysCode;
           $di = str_replace(' ', '-',$machine[0]->DevisionName);
        }
        else
        {
          $ra = str_replace(' ', '-',$machine[0]->Company);
          $di = str_replace(' ', '-',$machine[0]->CompanyLocation);
        }
        if($machine[0]->MachineWarranty == 'W')
        {
                $dt = Carbon\Carbon::now(); 
                $todaydate = $dt->toDateTimeString();
                if ($todaydate > $machine[0]->MachineWarrantyTo) 
                {
                  $w = 'NW';
                }
                else
                {
                  $w = 'W';
                }
        }
        else
        {
          $w = 'NW';
        }
        $organisation = substr($machine[0]->OrganisationName, 0,2);
        $TaskNumber = $organisation.'_'.$ra.'_'.$di.'_'.$machine[0]->MachineSerialNumber.'_'.$w;
        $ServiceLetter = $this->CommonController->upload_image($request->file('ServiceLetter'), "ServiceLetter");
        
        $save=ServiceMaster::insert([
                               'TaskNumber' => $TaskNumber,
                               'MachineSerialNumber' => $request->MachineSerialNumber,
                               'MachineId' => $machine[0]->MachineId,
                               'ServiceLocation' => $request->ServiceLocation,
                               'LetterReceivingDate' => $request->LetterReceivingDate,
                               'ServiceLetter' => $ServiceLetter,
                               'RailwaysZone' => $request->RailwaysZone,
                               'DevisionName' => $request->DevisionName,
                               'Remark' => $request->Remark,
                               'ServiceStatusId' => 1
                             ]);
        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('ServiceMasterController@index');
    }
   
    public function show(ServiceMaster $serviceMaster)
    {
        //
    }

    
    public function edit($ServiceId)
    {
        $service = DB::table('service_master')->where('ServiceId',$ServiceId)->get();
        $Machines = MachineMaster::where('MachineStatus',1)->get();
        return view('servicemaster.edit_service_master',compact('service','Machines'));

    }

    
    public function update(Request $request, $ServiceId)
    {
        $validateData = $request->validate([
                                            'MachineSerialNumber' => ['required'],
                                            'ServiceLocation' => ['required'],
                                            'LetterReceivingDate' => ['required'],
                                            'ServiceLetter' => ['mimes:pdf','max:10240'],
                                            'Remark' => ['required'],
                                             ]);
        
        $machine = DB::table('machine_master')
                   ->join('organisation_master', 'organisation_master.OrganisationId', '=', 'machine_master.OrganisationId')
                   ->leftJoin('railways_master', 'railways_master.RailwaysId', '=', 'machine_master.RailwaysId')
                   ->leftJoin('devision_master', 'devision_master.DevisionId', '=', 'machine_master.DevisionId')
                   ->where('machine_master.MachineSerialNumber', $request->MachineSerialNumber)
                   ->get();
        
        if(count($machine) < 1)
        {
          Session::flash('message', 'This machine serial no. is not correct');
          return redirect()->action('ServiceMasterController@edit');
        }
        if($machine[0]->RailwaysId)
        {
           $ra = $machine[0]->RailwaysCode;
           $di = str_replace(' ', '-',$machine[0]->DevisionName);
        }
        else
        {
          $ra = str_replace(' ', '-',$machine[0]->Company);
          $di = str_replace(' ', '-',$machine[0]->CompanyLocation);
        }
        if($machine[0]->MachineWarranty == 'W')
        {
                $dt = Carbon\Carbon::now(); 
                $todaydate = $dt->toDateTimeString();
                if ($todaydate > $machine[0]->MachineWarrantyTo) 
                {
                  $w = 'NW';
                }
                else
                {
                  $w = 'W';
                }
        }
        else
        {
          $w = 'NW';
        }
        $organisation = substr($machine[0]->OrganisationName, 0,2);
        $TaskNumber = $organisation.'_'.$ra.'_'.$di.'_'.$machine[0]->MachineSerialNumber.'_'.$w;

        $service = ServiceMaster::where('ServiceId',$ServiceId)->get();  
        if($request->file('ServiceLetter') == '') 
        { 
          DB::table('service_master')
           ->where('ServiceId',$ServiceId)
           ->update([
               'TaskNumber' => $TaskNumber,
               'MachineSerialNumber' => $request->MachineSerialNumber,
               'MachineId' => $machine[0]->MachineId,
               'ServiceLocation' => $request->ServiceLocation,
               'LetterReceivingDate' => $request->LetterReceivingDate,
               'RailwaysZone' => $request->RailwaysZone,
               'DevisionName' => $request->DevisionName,
               'Remark' => $request->Remark,
               'ServiceStatusId' => 1 
             ]);
        }
         
        else 
        {
          $image_path = public_path('/images/ServiceLetter/'.$service[0]->ServiceLetter);
        

          if(File::exists($image_path)) 
          {
             File::delete($image_path);
          }

          $ServiceLetter = $this->CommonController->upload_image($request->file('ServiceLetter'), "ServiceLetter");

          DB::table('service_master')
           ->where('ServiceId',$ServiceId)
           ->update([
               'TaskNumber' => $TaskNumber,
               'MachineSerialNumber' => $request->MachineSerialNumber,
               'MachineId' => $machine[0]->MachineId,
               'ServiceLocation' => $request->ServiceLocation,
               'LetterReceivingDate' => $request->LetterReceivingDate,
               'ServiceLetter' => $ServiceLetter,
               'RailwaysZone' => $request->RailwaysZone,
               'DevisionName' => $request->DevisionName,
               'Remark' => $request->Remark,
               'ServiceStatusId' => 1 ]);
        }

        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('ServiceMasterController@index');
    }

    
    public function destroy($ServiceId)
    {
      DB::table('service_master')->where('ServiceId',$ServiceId)
      ->update(['ServiceStatus' => 0]);
      Session::flash('message', 'Delete Successfully');
      return redirect()->action('ServiceMasterController@index');
    }

    public function getrailways(Request $request)
    {
      $machinenumber = $request->machinenumber;
      $data = DB::table('machine_master')
             ->join('railways_master', 'railways_master.RailwaysId', '=', 'machine_master.RailwaysId')
             ->join('devision_master', 'devision_master.DevisionId', '=', 'machine_master.DevisionId')
             ->select('railways_master.RailwaysId','railways_master.RailwaysZone','devision_master.DevisionId','devision_master.DevisionName')
             ->where('machine_master.MachineSerialNumber', $machinenumber)
             ->get(); 
      return response()->json((count($data) > 0) ? $data[0] : [], 200);
    }

    public function select_engineer()
    {
      return EngineerMaster::where('EngineerStatus',1)
             ->where('engineer_master.AssignTo', Auth()->User()->id)
             ->get();
    }
    public function assign(Request $request)
    { 
      $validateData = $request->validate(['EngineerId' => ['required']]);
      DB::table('service_master')
      ->where('ServiceId',$request->ServiceId)
      ->update(['EngineerId'=>$request->EngineerId,
                'ServiceStatusId' => 2]);

      Session::flash('message','Service Assign to Engineer Successfully');
      return redirect()->action('ServiceMasterController@index');
    }

    public function performancepoint(Request $request)
    {
      $engineer = $request->EngineerId;
      $service = $request->ServiceId;
      

        return view('servicemaster.performance_point',compact('engineer', 'service'));
    }

    public function add_performance(Request $request)
    {
      $validatedData = $request->validate([
                                            'QuestionOne' => ['required'],
                                            'QuestionTwo' => ['required'],
                                            'QuestionThree' => ['required'],
                                            'QuestionFour' => ['required'],
                                            'QuestionFive' => ['required'], ]);
      $marks = DB::table('engineer_performance_point')
               ->insert([
                         'ServiceId' => $request->ServiceId,
                         'EngineerId' => $request->EngineerId,
                         'QuestionOne' => $request->QuestionOne,
                         'QuestionTwo' => $request->QuestionTwo,
                         'QuestionThree' => $request->QuestionThree,
                         'QuestionFour' => $request->QuestionFour,
                         'QuestionFive' => $request->QuestionFive,
                         'Total_Marks' => $request->Total_Marks ]);

      $service_status = DB::table('service_master')
                        ->where('ServiceId',$request->ServiceId)
                        ->update(['ServiceStatusId' =>6 ]);


      Session::flash('message','Engineer Performance Marks Successfully Saved');
      return redirect()->action('ServiceMasterController@index');

    }


    
    public function acceptreject(Request $request)
    {

      $validator = $this->validateuser($request->data);

      if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(), 422);
        }

        else
        { 
          if($request->data['type']=='Accept')
            {
            $accept =  DB::table('service_master')
                       ->where('ServiceId',$request->data['ServiceId'])
                       ->update(['ServiceStatusId' => 4 ]);

            $accept1 = DB::table('engineer_master')
                       ->where('EngineerId',$request->data['EngineerId'])
                       ->update(['EngineerSiteStatus' => 1]);

            $engineeronsite = EngineerOnSite::insert([
                                                      'EngineerId'=>$request->data['EngineerId'],
                                                      'ServiceId'=>$request->data['ServiceId'], ]);

           if($engineeronsite) 
           {
             return $this->CommonController->successResponse('','Accept Task Successfully',200);
           }
           else
           {
            return $this->CommonController->errorResponse('Data Does Not Match',422);
           }
            }

          elseif ($request->data['type']=='Reject') 
          {
            $rejectby =  DB::table('service_master')
           ->where('ServiceId',$request->data['ServiceId'])
           ->update([
               'EngineerId' =>'Null',
               'RejectedBy' => $request->data['EngineerId'],
               'EngineerComment' => $request->data['EngineerComment'],
               'ServiceStatusId' => 3 ]);

           if ($rejectby) 
           {
             return $this->CommonController->successResponse('','Your Task Rejected Successfully',200);
           }
           else
           {
            return $this->CommonController->errorResponse('Data Does Not Match',422);
           }
          }

          else
          {
            return $this->CommonController->errorResponse('Type Mismatch',422);
          }
          
        }

    }

    public function validateuser($data)
    
    {  
        return Validator::make($data, ['type' => 'required',
                                       'ServiceId' => 'required',
                                       'EngineerId' => 'required',
                                       'EngineerComment' => 'required_if:type,"Reject"' ]);
    }

    //Api's For Show Service Task
    public function fetchservices(Request $request)
    {
      $validator = $this->validateEngineer($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('service_master')
                ->join('service_status','service_status.ServiceStatusId', '=', 'service_master.ServiceStatusId')
                ->whereIn('service_master.ServiceStatusId', ['2', '4'])
                ->where('service_master.ServiceStatus', 1)
                ->where('EngineerId', $request->data['EngineerId'])
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
    public function validateEngineer($data)
    
    {
        return Validator::make($data, [
                                       'EngineerId' => 'required']);
    }

    


      // this function is for sevice details api
    public function ServiceComplete(Request $request)
    {
        $serviceDetailsInsertData = DB::table('service_details')
                                      ->insert([
                                          'ServiceId'=>$request->serviceDetail[0]['ServiceId'],
                                          'TravelingFrom'=>$request->serviceDetail[0]['TravelingFrom'],
                                          'TravelingTo'=>$request->serviceDetail[0]['TravelingTo'],
                                          'TrainNo'=>$request->serviceDetail[0]['TrainNo'],
                                          'TravelingRetrunFrom'=>$request->serviceDetail[0]['TravelingRetrunFrom'],
                                          'TravelingReturnTo'=>$request->serviceDetail[0]['TravelingReturnTo'],
                                          'RetrunTrainNo'=>$request->serviceDetail[0]['RetrunTrainNo'],
                                          'TravelKiloMeter'=>$request->serviceDetail[0]['TravelKiloMeter'],
                                          'ComplaintNature'=>$request->serviceDetail[0]['ComplaintNature'],
                                          'WorkDoneType'=>$request->serviceDetail[0]['WorkDoneType'],
                                          'EngineHRS'=>$request->serviceDetail[0]['EngineHRS'],
                                          'KiloMeterReading'=>$request->serviceDetail[0]['KiloMeterReading'],
                                          'SparesConsuption'=>$request->serviceDetail[0]['SparesConsuption'],
                                          'ReferenceNumber'=>$request->serviceDetail[0]['ReferenceNumber'],
                                          'ServicePlace'=>$request->serviceDetail[0]['ServicePlace'],
                                          'Department'=>$request->serviceDetail[0]['Department'],
                                          'TampingCounter'=>$request->serviceDetail[0]['TampingCounter'],
                                          'ServiceStartDate'=>$request->serviceDetail[0]['ServiceStartDate'],
                                          'Remark'=>$request->serviceDetail[0]['Remark']
                                      ]);


        //Service Work Details
        $work = $request->serviceworkDetail;
        for($i = 0; $i < count($work); $i++)
        {
          $work_detail[] = ['ServiceId'=> $work[$i]['ServiceId'],
                            'ServiceWorkDate'=> $work[$i]['ServiceWorkDate'],
                            'TimeFrom'=> $work[$i]['TimeFrom'],
                            'TimeTo'=> $work[$i]['TimeTo'],
                            'TotalHRS'=> $work[$i]['TotalHRS'],
                            'WorkDescription'=> $work[$i]['WorkDescription'],
                          ];
        }

        $serviceworkdetailData= DB::table('service_work_detail')->insert($work_detail);

        //Service Travelling details
        $travelling_detail = $request->travellingDetail;
        for($i = 0; $i < count($travelling_detail); $i++)
        {
          $travellingDetail[] = ['ServiceId' => $travelling_detail[$i]['ServiceId'],
                              'EngineerId' => $travelling_detail[$i]['EngineerId'],
                              'arrivalreturn' => 'Arrival',
                              'TravellingBy' => $travelling_detail[$i]['TravellingBy'],
                              'KMTravelled' => $travelling_detail[$i]['KMTravelled'],
                              'HRSTill' => $travelling_detail[$i]['HRSTill'],
                              'TravellingTimeFrom' => $travelling_detail[$i]['TravellingTimeFrom'],
                              'TravellingTimeTo' => $travelling_detail[$i]['TravellingTimeTo'],
                              'TravellingPlaceFrom' => $travelling_detail[$i]['TravellingPlaceFrom'],
                              'TravellingPlaceTo' => $travelling_detail[$i]['TravellingPlaceTo'],
                              'VehicleNumber' => $travelling_detail[$i]['VehicleNumber'], ];
        }
        $travelling_detail_data = DB::table('travelling_details')->insert($travellingDetail);

        //Engineer On Site
        $engineeronsiteData = DB::table('engineer_on_site')
                              ->where('ServiceId',$request->serviceDetail[0]['ServiceId'])
                              ->update(['FromDate'=>$request->serviceDetail[0]['ServiceStartDate'] ]);

         $reportsdata = $this->ReportsController->format_data($request->serviceDetail[0]['ServiceId']);
         $pdf = PDF::loadView('reports.reports_format',compact('reportsdata'));
         
         $imagename = substr(str_replace(" ", "", microtime()),2).'.pdf';
         $destinationPath = public_path('/images/Report/');
         $pdf->save($destinationPath . $imagename);

         $updatereport = DB::table('service_details')
                         ->where('ServiceId',$request->serviceDetail[0]['ServiceId'])
                         ->update(['ReportFile'=>$imagename]);

         $report1 = $this->ReportsController->format_data($request->serviceDetail[0]['ServiceId']);

         if($engineeronsiteData)
         {
            return $this->CommonController->successResponse('','Your data inserted successfully',200);
         }
         else
         {
            return $this->CommonController->errorResponse('Unable to insert data',422);
         }

         return $report1;
       // }

    }

    public function ServiceFinalComplete(Request $request)
    { 
       $startdate = DB::table('service_details')
                    ->where('ServiceId',$request->engineerallowance[0]['ServiceId'])
                    ->select('ServiceStartDate')
                    ->get();
                  
        $firstdate = (count($startdate) > 0) ? $startdate[0]->ServiceStartDate : '';
        $secondDate = $request->serviceDetail[0]['ServiceCompeleteDate'];

        $datetime1 = new DateTime($firstdate);
        $datetime2 = new DateTime($secondDate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $days= $days+1;

        $serviceDetailsInsertData = DB::table('service_details')
                                    ->where('ServiceId',$request->engineerallowance[0]['ServiceId'])
                                      ->update([
                                          'ServiceStartDate'=>$firstdate,
                                          'ServiceCompeleteDate'=>$request->serviceDetail[0]['ServiceCompeleteDate'],
                                          'TotalLeaveDays'=>$request->serviceDetail[0]['TotalLeaveDays'],
                                          'TotalServiceDays'=>$days,
                                      ]);

        $engineerleaveupdate = DB::table('engineer_master')
                               ->where('EngineerId',$request->engineerallowance[0]['EngineerId'])
                               ->update(['EngineerTotalLeaves'=>DB::raw('EngineerTotalLeaves' .'+'. $request->serviceDetail[0]['TotalLeaveDays']) ]);

                          
      //Service Expense Details
        $expense_detail = $request->expenseDetail;
        for($i = 0; $i < count($expense_detail); $i++)
        {
          $expenseDetail[] = ['ServiceId' => $expense_detail[$i]['ServiceId'],
                              'EngineerId' => $expense_detail[$i]['EngineerId'],
                              'ExpenseComment' => $expense_detail[$i]['ExpenseComment'],
                              'ExpensePrice' => $expense_detail[$i]['ExpensePrice'],
                              'ExpenseBill' => $expense_detail[$i]['ExpenseBill'], ];
        }

        $expense_detail_data = DB::table('expense_details')->insert($expense_detail);

        //Engineer On Site
        $engineeronsiteData = DB::table('engineer_on_site')
                              ->where('ServiceId',$request->engineerallowance[0]['ServiceId'])
                              ->update([
                                'FromDate'=>$firstdate,
                                'ToDate'=>$request->serviceDetail[0]['ServiceCompeleteDate'],
                                'TotalDays'=>$days,
                                'OnSiteStatus' => 0 ]);

        //Engineer Allowance

        $engineerallowanceData = DB::table('engineer_allowance')
                                 ->insert([
                                  'ServiceId'=>$request->engineerallowance[0]['ServiceId'],
                                  'EngineerId'=>$request->engineerallowance[0]['EngineerId'],
                                  'OverBudgetApproval'=>$request->engineerallowance[0]['OverBudgetApproval'],
                                  'TotalDays'=>$request->engineerallowance[0]['TotalDays'],
                                  'EngineerTA'=>$request->engineerallowance[0]['EngineerTA'],
                                  'TotalTA'=>$request->engineerallowance[0]['TotalTA'],
                                  'ConveyanceId'=>$request->engineerallowance[0]['ConveyanceId'],
                                  'ConveyanceAllowance'=>$request->engineerallowance[0]['ConveyanceAllowance'],
                                  'TotalConveyanceAllowance'=>$request->engineerallowance[0]['TotalConveyanceAllowance'],
                                  'FinalTotal'=>$request->engineerallowance[0]['FinalTotal'],
                                  ]);
        //Service Travelling details

        $travelling_detail = $request->travellingDetail;
        for($i = 0; $i < count($travelling_detail); $i++)
        {
           $travellingDetail[] = ['ServiceId' => $travelling_detail[$i]['ServiceId'],
                                  'EngineerId' => $travelling_detail[$i]['EngineerId'],
                                  'arrivalreturn' => 'Return',
                                  'TravellingBy' => $travelling_detail[$i]['TravellingBy'],
                                  'KMTravelled' => $travelling_detail[$i]['KMTravelled'],
                                  'HRSTill' => $travelling_detail[$i]['HRSTill'],
                                  'TravellingTimeFrom' => $travelling_detail[$i]['TravellingTimeFrom'],
                                  'TravellingTimeTo' => $travelling_detail[$i]['TravellingTimeTo'],
                                  'TravellingPlaceFrom' => $travelling_detail[$i]['TravellingPlaceFrom'],
                                  'TravellingPlaceTo' => $travelling_detail[$i]['TravellingPlaceTo'],
                                  'VehicleNumber' => $travelling_detail[$i]['VehicleNumber'], ];
        }

        $travelling_detail_data = DB::table('travelling_details')->insert($travellingDetail);

        $servicemasterUpdated = DB::table('service_master')->where('ServiceId',$request->engineerallowance[0]['ServiceId'])
                                ->update(['ServiceStatusId'=>5]);



        $EngineerSiteStatusData = DB::table('engineer_master')
                                  ->where('EngineerId',$request->engineerallowance[0]['EngineerId'])
                                  ->update(['EngineerSiteStatus'=>0]);

        if($EngineerSiteStatusData)
         {
            return $this->CommonController->successResponse('','Your data inserted successfully',200);
         }
         else
         {
            return $this->CommonController->errorResponse('Unable to insert data',422);
         }


    }

    public function expense_bill_insert(Request $request)
    {
      $total_bill = count($request->File('ExpenseBill'));
      $bill = [];

      for ($i=0 ; $i < $total_bill ; $i++ ) 
      { 
        $expense_bill = $this->CommonController->upload_image($request->file('ExpenseBill')[$i],"ExpenseBill");
        array_push($bill, $expense_bill);
      }

      return $this->CommonController->successResponse($bill,'File Uploaded Successfully',200);

    }

    public function overbudgetapproval(Request $request)
    {

      $validator = $this->validatemyuser($request->data);

      if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(), 422);
        }

      else
          {
             $update = DB::table('service_master')
                       ->where('ServiceId',$request->data['ServiceId'])
                       ->update(['BudgetReason'=>$request->data['BudgetReason'],
                                 'UserRequest' => 1]);

             if ($update) 
             {
               return $this->CommonController->successResponse('','Your data updated successfully',200);
             }
             else
             {
              return $this->CommonController->errorResponse('Type Mismatch',422);
             }
          }

    }

    public function validatemyuser($data)
    
    {  
        return Validator::make($data, ['ServiceId' => 'required',
                                       'BudgetReason' => 'required' ]);
    }

    public function budgetapproval(Request $request)

    {
        $data = DB::table('service_master')->where('ServiceId',$request->ServiceId)
                ->update(['AdminApprovalBudget'=>$request->AdminApprovalBudget ]);

         return view('servicemaster.index');
      
    }

    public function fetchservicedetail(Request $request)

    {
      $validator = $this->validateUsers($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('service_details')
                ->leftJoin('service_work_detail','service_work_detail.ServiceId', '=', 'service_details.ServiceId')
                ->leftJoin('travelling_details','travelling_details.ServiceId', '=', 'service_details.ServiceId')
                ->where('service_details.ServiceId', $request->data['ServiceId'])
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
    public function validateUsers($data)
    
    {
        return Validator::make($data, [
                                       'ServiceId' => 'required']);
    }

    public function fetchfinalservicedetail(Request $request)

    {
      $validator = $this->validateUsersfinal($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('service_details')
                ->leftJoin('service_work_detail','service_work_detail.ServiceId', '=', 'service_details.ServiceId')
                ->leftJoin('travelling_details','travelling_details.ServiceId', '=', 'service_details.ServiceId')
                ->leftJoin('expense_details','expense_details.ServiceId', '=', 'service_details.ServiceId')
                ->leftJoin('engineer_allowance','engineer_allowance.ServiceId', '=', 'service_details.ServiceId')
                ->where('service_details.ServiceId', $request->data['ServiceId'])
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
    public function validateUsersfinal($data)
    
    {
        return Validator::make($data, [
                                       'ServiceId' => 'required']);
    }

    public function update_service(Request $request,$ServiceId)
    {

      //$ServiceId = str_replace("\n", '', $Id);
      $serviceDetailsUpdateData = DB::table('service_details')
                                  ->where('ServiceId',$ServiceId)
                                  ->update([
                                          'TravelingFrom'=>$request->serviceDetail[0]['TravelingFrom'],
                                          'TravelingTo'=>$request->serviceDetail[0]['TravelingTo'],
                                          'TrainNo'=>$request->serviceDetail[0]['TrainNo'],
                                          'TravelingRetrunFrom'=>$request->serviceDetail[0]['TravelingRetrunFrom'],
                                          'TravelingReturnTo'=>$request->serviceDetail[0]['TravelingReturnTo'],
                                          'RetrunTrainNo'=>$request->serviceDetail[0]['RetrunTrainNo'],
                                          'TravelKiloMeter'=>$request->serviceDetail[0]['TravelKiloMeter'],
                                          'ComplaintNature'=>$request->serviceDetail[0]['ComplaintNature'],
                                          'WorkDoneType'=>$request->serviceDetail[0]['WorkDoneType'],
                                          'EngineHRS'=>$request->serviceDetail[0]['EngineHRS'],
                                          'KiloMeterReading'=>$request->serviceDetail[0]['KiloMeterReading'],
                                          'SparesConsuption'=>$request->serviceDetail[0]['SparesConsuption'],
                                          'ReferenceNumber'=>$request->serviceDetail[0]['ReferenceNumber'],
                                          'ServicePlace'=>$request->serviceDetail[0]['ServicePlace'],
                                          'Department'=>$request->serviceDetail[0]['Department'],
                                          'TampingCounter'=>$request->serviceDetail[0]['TampingCounter'],
                                          'ServiceStartDate'=>$request->serviceDetail[0]['ServiceStartDate'],
                                          'Remark'=>$request->serviceDetail[0]['Remark']
                                      ]);
      
        $delete = DB::table('service_work_detail')
                  ->where('ServiceId',$ServiceId)
                  ->delete();

       

        //Service Work Details
        $work = $request->serviceworkDetail;
        for($i = 0; $i < count($work); $i++)
        {
          $work_detail[] = ['ServiceId'=> $ServiceId,
                            'ServiceWorkDate'=> $work[$i]['ServiceWorkDate'],
                            'TimeFrom'=> $work[$i]['TimeFrom'],
                            'TimeTo'=> $work[$i]['TimeTo'],
                            'TotalHRS'=> $work[$i]['TotalHRS'],
                            'WorkDescription'=> $work[$i]['WorkDescription'],
                          ];
        }

        $serviceworkdetailData= DB::table('service_work_detail')->insert($work_detail);

        $traveldelete = DB::table('travelling_details')
                        ->where('ServiceId',$ServiceId)
                        ->where('arrivalreturn','Arrival')
                        ->delete();

        

        //Service Travelling details
        $travellingDetails = $request->travellingDetail;
        foreach ($travellingDetails as &$travellingDetail) {
          $travellingDetail['ServiceId'] = $ServiceId;
          $travellingDetail['arrivalreturn'] = 'Arrival';  
        }
        
        $travelling_detail_data = DB::table('travelling_details')->insert($travellingDetails);
        //Engineer On Site

        $engineeronsiteData = DB::table('engineer_on_site')
                              ->where('ServiceId',$ServiceId)
                              ->update(['FromDate'=>$request->serviceDetail[0]['ServiceStartDate'] ]);
         $reportsdata = $this->ReportsController->format_data($ServiceId);
         $pdf = PDF::loadView('reports.reports_format',compact('reportsdata'));
         
         $imagename = substr(str_replace(" ", "", microtime()),2).'.pdf';
         $destinationPath = public_path('/images/Report/');
         $pdf->save($destinationPath . $imagename);

         $updatereport = DB::table('service_details')
                         ->where('ServiceId',$ServiceId)
                         ->update(['ReportFile'=>$imagename]);

         $report1 = $this->ReportsController->format_data($ServiceId);

         if($updatereport)
         {
            return $this->CommonController->successResponse('','Your data updated successfully',200);
         }
         else
         {
            return $this->CommonController->errorResponse('Unable to update data',422);
         }

         return $report1;
    }

    public function ServiceFinalUpdateComplete(Request $request, $ServiceId)
    { 
       $startdate = DB::table('service_details')
                    ->where('ServiceId',$ServiceId)
                    ->select('ServiceStartDate')
                    ->get();
                  
        $firstdate = (count($startdate) > 0) ? $startdate[0]->ServiceStartDate : '';
        $secondDate = $request->serviceDetail[0]['ServiceCompeleteDate'];
        $datetime1 = new DateTime($firstdate);
        $datetime2 = new DateTime($secondDate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $days= $days+1;

        $serviceDetailsInsertData = DB::table('service_details')
                                    ->where('ServiceId',$ServiceId)
                                      ->update([
                                          'ServiceStartDate'=>$firstdate,
                                          'ServiceCompeleteDate'=>$request->serviceDetail[0]['ServiceCompeleteDate'],
                                          'TotalLeaveDays'=>$request->serviceDetail[0]['TotalLeaveDays'],
                                          'TotalServiceDays'=>$days,
                                      ]);

        $engineerleaveupdate = DB::table('engineer_master')
                               ->where('EngineerId',$request->engineerallowance[0]['EngineerId'])
                               ->update(['EngineerTotalLeaves'=>DB::raw('EngineerTotalLeaves' .'+'. $request->serviceDetail[0]['TotalLeaveDays']) ]);

        
        $expensedelete = DB::table('expense_details')->where('ServiceId',$ServiceId)->delete();

      //Service Expense Details
        $expense_detail = $request->expenseDetail;
        for($i = 0; $i < count($expense_detail); $i++)
        {
          $expenseDetail[] = ['ServiceId' => $ServiceId,
                              'EngineerId' => $expense_detail[$i]['EngineerId'],
                              'ExpenseComment' => $expense_detail[$i]['ExpenseComment'],
                              'ExpensePrice' => $expense_detail[$i]['ExpensePrice'],
                              'ExpenseBill' => $expense_detail[$i]['ExpenseBill'], ];
        }

        $expense_detail_data = DB::table('expense_details')->insert($expense_detail);

        //Engineer On Site
        $engineeronsiteData = DB::table('engineer_on_site')
                              ->where('ServiceId',$ServiceId)
                              ->update([
                                'FromDate'=>$firstdate,
                                'ToDate'=>$request->serviceDetail[0]['ServiceCompeleteDate'],
                                'TotalDays'=>$days ]);

        //Engineer Allowance
        
        $allowancedelete = DB::table('engineer_allowance')->where('ServiceId',$ServiceId)->delete();

        $engineerallowanceData = DB::table('engineer_allowance')
                                 ->insert([
                                  'ServiceId'=>$ServiceId,
                                  'EngineerId'=>$request->engineerallowance[0]['EngineerId'],
                                  'OverBudgetApproval'=>$request->engineerallowance[0]['OverBudgetApproval'],
                                  'TotalDays'=>$request->engineerallowance[0]['TotalDays'],
                                  'EngineerTA'=>$request->engineerallowance[0]['EngineerTA'],
                                  'TotalTA'=>$request->engineerallowance[0]['TotalTA'],
                                  'ConveyanceId'=>$request->engineerallowance[0]['ConveyanceId'],
                                  'ConveyanceAllowance'=>$request->engineerallowance[0]['ConveyanceAllowance'],
                                  'TotalConveyanceAllowance'=>$request->engineerallowance[0]['TotalConveyanceAllowance'],
                                  'FinalTotal'=>$request->engineerallowance[0]['FinalTotal'],
                                  ]);
        //Service Travelling details
        

        $travellingdelete = DB::table('travelling_details')
                            ->where('ServiceId',$ServiceId)
                            ->where('arrivalreturn','Return')
                            ->delete();
                            
        $travelling_detail = $request->travellingDetail;
        for($i = 0; $i < count($travelling_detail); $i++)
        {
           $travellingDetail[] = ['ServiceId' => $ServiceId,
                                  'EngineerId' => $travelling_detail[$i]['EngineerId'],
                                  'arrivalreturn' => 'Return',
                                  'TravellingBy' => $travelling_detail[$i]['TravellingBy'],
                                  'KMTravelled' => $travelling_detail[$i]['KMTravelled'],
                                  'HRSTill' => $travelling_detail[$i]['HRSTill'],
                                  'TravellingTimeFrom' => $travelling_detail[$i]['TravellingTimeFrom'],
                                  'TravellingTimeTo' => $travelling_detail[$i]['TravellingTimeTo'],
                                  'TravellingPlaceFrom' => $travelling_detail[$i]['TravellingPlaceFrom'],
                                  'TravellingPlaceTo' => $travelling_detail[$i]['TravellingPlaceTo'],
                                  'VehicleNumber' => $travelling_detail[$i]['VehicleNumber'] ];
        }

        $travelling_detail_data = DB::table('travelling_details')->insert($travellingDetail);

        

        if($travelling_detail_data)
         {
            return $this->CommonController->successResponse('','Your data updated successfully',200);
         }
         else
         {
            return $this->CommonController->errorResponse('Unable to update data',422);
         }


    }

}