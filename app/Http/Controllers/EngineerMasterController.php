<?php

namespace App\Http\Controllers;

use App\EngineerMaster;
use App\EngineerDesignationMaster;
use App\UserDesignationMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use File;
use Illuminate\Support\Facades\Hash;
use Auth;

class EngineerMasterController extends Controller
{
    public function __construct(Request $request)
    {
        $this->CommonController = new CommonController();
    }

    public function index()
    {
        $data = DB::table('engineer_master')
                ->join('engineer_designation_master', 'engineer_designation_master.EngineerDesignationId', '=', 'engineer_master.EngineerDesignation')
                ->leftJoin('engineer_performance_point', 'engineer_performance_point.EngineerId', '=', 'engineer_master.EngineerId')
                ->leftJoin('user_location', function($query)
                  {
                     $query->on('engineer_master.EngineerId','=','user_location.EngineerId')
                     ->whereRaw('user_location.LocationId IN (select a2.LocationId from user_location as a2 join engineer_master as u2 on u2.EngineerId = a2.EngineerId group by u2.EngineerId)')
                     ->whereRaw('user_location.Latitude IN (select a2.Latitude from user_location as a2 join engineer_master as u2 on u2.EngineerId = a2.EngineerId group by u2.EngineerId)')
                     ->whereRaw('user_location.Longitude IN (select a2.Longitude from user_location as a2 join engineer_master as u2 on u2.EngineerId = a2.EngineerId group by u2.EngineerId)');
                  })
//                ->where('engineer_master.AssignTo', Auth()->User()->id)
                ->where('engineer_master.EngineerStatus',1)
                ->orderBy('engineer_master.EngineerId', 'desc')
                ->groupBy('engineer_master.EngineerId')
                ->select('engineer_master.*', 'engineer_designation_master.EngineerDesignationName', DB::raw('avg(engineer_performance_point.Total_Marks) AS Performance'),'user_location.LocationId','user_location.Latitude','user_location.Longitude' )
                ->get();
        return view('engineermaster.index', compact('data'));
    }

    public function create()
    {
        $data1 = EngineerDesignationMaster::where('EngineerDesignationStatus', 1)->get();
        $user = DB::table('users_designation_master')
                ->join('users', 'users.UserDesignationId', '=', 'users_designation_master.UserDesignationId')
                ->select('users_designation_master.*', 'users.name', 'UserLastName', 'id')
                ->where('UserDesignationStatus', 1)
                ->get();
        return view('engineermaster.add_engineer_master', compact('data1','user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                            'EngineerName' => ['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255'],
                                            'EngineerDesignation' => ['required'],
                                            'EngineerQualification' => ['required', 'string', 'max:255'],
                                            'EngineerMobile' => ['required','regex:/^([987]{1})(\d{1})(\d{8})$/', 'max:255'],
                                            'EngineerEmail' => ['required', 'email', 'max:255', 'unique:engineer_master'],
                                            'EngineerPassword' => ['required', 'string', 'min:6'],
                                            'EngineerPermanentAddress' => ['required', 'string', 'max:255'],
                                            'EngineerCurrentAddress' => ['required', 'string', 'max:255'],
                                            'EngineerDocuments' => ['required','mimes:pdf','max:10240'],
                                            'ProfilePic' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
                                            'DocumentDescription' => ['required', 'string', 'max:255'],
                                            'EngineerTotalLeaves'=>['required','numeric','min:1'],
                                            'EarningLeave'=>['required','numeric'],
                                            'SickLeave'=>['required','numeric'],
                                            'PersonalLeave'=>['required','numeric'],
                                            'EmployeeId'=>['required'],
                                            'AssignTo'=>['required'] ]);


        $EngineerDocuments = $this->CommonController->upload_image($request->file('EngineerDocuments'), "EngineerDocuments");
        $ProfilePic = $this->CommonController->upload_image($request->file('ProfilePic'), "ProfilePic");

        EngineerMaster::insert([
                                'EngineerName' => $request->EngineerName,
                                'EngineerDesignation' => $request->EngineerDesignation,
                                'EngineerQualification' => $request->EngineerQualification,
                                'EngineerMobile' => $request->EngineerMobile,
                                'EngineerEmail' => $request->EngineerEmail,
                                'EngineerPassword' => Hash::make($request->EngineerPassword),
                                'EngineerPermanentAddress' => $request->EngineerPermanentAddress,
                                'EngineerCurrentAddress' => $request->EngineerCurrentAddress,
                                'EngineerDocuments' => $EngineerDocuments,
                                'ProfilePic' => $ProfilePic,
                                'DocumentDescription' => $request->DocumentDescription,
                                'EngineerTotalLeaves'=>$request->EngineerTotalLeaves,
                                'EL'=>$request->EarningLeave,
                                'SL'=>$request->SickLeave,
                                'PL'=>$request->PersonalLeave,
                                'EmployeeId'=>$request->EmployeeId,
                                'AssignTo'=> $request->AssignTo  ]);

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('EngineerMasterController@index');
    }

    public function show(EngineerMaster $engineerMaster)
    {
        //
    }

    public function edit($EngineerId)
    {
        $data1 = EngineerDesignationMaster::where('EngineerDesignationStatus', 1)->get();
        $data = EngineerMaster::where('EngineerId', $EngineerId)->get();
        $user = DB::table('users_designation_master')
                ->leftJoin('users', 'users.UserDesignationId', '=', 'users_designation_master.UserDesignationId')
                ->select('users_designation_master.*', 'users.name', 'UserLastName', 'id')
                ->where('UserDesignationStatus', 1)
                ->get();
        return view('engineermaster.edit_engineer_master', compact('data', 'data1', 'user'));
    }

    public function update(Request $request, $EngineerId)
    {
        $validatedData = $request->validate([
                                            'EngineerName' => ['required', 'regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255'],
                                            'EngineerDesignation' => ['required'],
                                            'EngineerQualification' => ['required', 'string', 'max:255'],
                                            'EngineerMobile' => ['required','regex:/^([987]{1})(\d{1})(\d{8})$/', 'max:255'],
                                            'EngineerEmail' => ['required', 'email', 'max:255'],
                                            'EngineerPermanentAddress' => ['required', 'string', 'max:255'],
                                            'EngineerCurrentAddress' => ['required', 'string', 'max:255'],
                                            'DocumentDescription' => ['required', 'string', 'max:255'],
                                            'EngineerTotalLeaves'=>['required','numeric','min:1'],
                                            'EarningLeave'=>['required','numeric'],
                                            'SickLeave'=>['required','numeric'],
                                            'PersonalLeave'=>['required','numeric'],
                                            'EmployeeId'=>['required'],
                                            'AssignTo'=>['required'] ]);


        $EngineerDocuments = $request->file('EngineerDocuments');
        $ProfilePic = $request->file('ProfilePic');

        if($EngineerDocuments == '' && $ProfilePic == '')
        {
           DB::table('engineer_master')->where('EngineerId', $EngineerId)
            ->update(['EngineerName' => $request->EngineerName,
                      'EngineerDesignation' => $request->EngineerDesignation,
                      'EngineerQualification' => $request->EngineerQualification,
                      'EngineerMobile' => $request->EngineerMobile,
                      'EngineerEmail' => $request->EngineerEmail,
                      'EngineerPermanentAddress' => $request->EngineerPermanentAddress,
                      'EngineerCurrentAddress' => $request->EngineerCurrentAddress,
                      'DocumentDescription' => $request->DocumentDescription ,
                      'EngineerTotalLeaves'=>$request->EngineerTotalLeaves,
                      'EL'=>$request->EarningLeave,
                      'SL'=>$request->SickLeave,
                      'PL'=>$request->PersonalLeave,
                      'EmployeeId'=>$request->EmployeeId,
                      'AssignTo'=>$request->AssignTo  ]);
        }
        elseif($EngineerDocuments != '' && $ProfilePic == '')
        {
            $validatedData = $request->validate(['EngineerDocuments' => ['mimes:pdf','max:10240'] ]);
            $data = EngineerMaster::where('EngineerId', $EngineerId)->get();
            $image_path = public_path('/images/EngineerDocuments/'.$data[0]->EngineerDocuments);

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            $DocumentName = $this->CommonController->upload_image($EngineerDocuments, "EngineerDocuments");

            DB::table('engineer_master')->where('EngineerId', $EngineerId)
            ->update(['EngineerName' => $request->EngineerName,
                      'EngineerDesignation' => $request->EngineerDesignation,
                      'EngineerQualification' => $request->EngineerQualification,
                      'EngineerMobile' => $request->EngineerMobile,
                      'EngineerEmail' => $request->EngineerEmail,
                      'EngineerPermanentAddress' => $request->EngineerPermanentAddress,
                      'EngineerCurrentAddress' => $request->EngineerCurrentAddress,
                      'EngineerDocuments' => $DocumentName,
                      'DocumentDescription' => $request->DocumentDescription ,
                      'EngineerTotalLeaves'=>$request->EngineerTotalLeaves,
                      'EL'=>$request->EarningLeave,
                      'SL'=>$request->SickLeave,
                      'PL'=>$request->PersonalLeave,
                      'EmployeeId'=>$request->EmployeeId,
                      'AssignTo'=>$request->AssignTo  ]);
        }

        elseif($EngineerDocuments == '' && $ProfilePic != '')
        {
           $validatedData1 = $request->validate(['ProfilePic' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'] ]);
            $data1 = EngineerMaster::where('EngineerId', $EngineerId)->get();
            $image_path1 = public_path('/images/ProfilePic/'.$data1[0]->ProfilePic);

            if(File::exists($image_path1))
            {
                File::delete($image_path1);
            }

            $DocumentName1 = $this->CommonController->upload_image($ProfilePic, "ProfilePic");

            DB::table('engineer_master')->where('EngineerId', $EngineerId)
            ->update(['EngineerName' => $request->EngineerName,
                      'EngineerDesignation' => $request->EngineerDesignation,
                      'EngineerQualification' => $request->EngineerQualification,
                      'EngineerMobile' => $request->EngineerMobile,
                      'EngineerEmail' => $request->EngineerEmail,
                      'EngineerPermanentAddress' => $request->EngineerPermanentAddress,
                      'EngineerCurrentAddress' => $request->EngineerCurrentAddress,
                      'ProfilePic' => $DocumentName1,
                      'DocumentDescription' => $request->DocumentDescription ,
                      'EngineerTotalLeaves'=>$request->EngineerTotalLeaves,
                      'EL'=>$request->EarningLeave,
                      'SL'=>$request->SickLeave,
                      'PL'=>$request->PersonalLeave,
                      'EmployeeId'=>$request->EmployeeId,
                      'AssignTo'=>$request->AssignTo  ]);
        }

        else
        {
            $data = EngineerMaster::where('EngineerId', $EngineerId)->get();
            $validatedData = $request->validate(['EngineerDocuments' => ['mimes:pdf','max:10240'] ]);
            $validatedData1 = $request->validate(['ProfilePic' => ['mimes:pdf'] ]);
            $DocumentName = $this->CommonController->upload_image($EngineerDocuments, "EngineerDocuments");
            $DocumentName1 = $this->CommonController->upload_image($ProfilePic, "ProfilePic");
            $image_path = public_path('/images/EngineerDocuments/'.$data[0]->EngineerDocuments);
            $image_path1 = public_path('/images/ProfilePic/'.$data[0]->ProfilePic);

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            if(File::exists($image_path1))
            {
                File::delete($image_path1);
            }



            DB::table('engineer_master')->where('EngineerId', $EngineerId)
            ->update(['EngineerName' => $request->EngineerName,
                      'EngineerDesignation' => $request->EngineerDesignation,
                      'EngineerQualification' => $request->EngineerQualification,
                      'EngineerMobile' => $request->EngineerMobile,
                      'EngineerEmail' => $request->EngineerEmail,
                      'EngineerPermanentAddress' => $request->EngineerPermanentAddress,
                      'EngineerCurrentAddress' => $request->EngineerCurrentAddress,
                      'EngineerDocuments' =>$DocumentName,
                      'ProfilePic' => $DocumentName1,
                      'DocumentDescription' => $request->DocumentDescription,
                      'EngineerTotalLeaves'=>$request->EngineerTotalLeaves,
                      'EL'=>$request->EarningLeave,
                      'SL'=>$request->SickLeave,
                      'PL'=>$request->PersonalLeave,
                      'EmployeeId'=>$request->EmployeeId,
                      'AssignTo'=>$request->AssignTo  ]);
        }

        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('EngineerMasterController@index');
    }


    public function destroy($EngineerId)
    {
        DB::table('engineer_master')->where('EngineerId', $EngineerId)
        ->update(['EngineerStatus' => 0]);
        Session::flash('message', 'Your Data Delete Successfully');
        return redirect()->action('EngineerMasterController@index');
    }

    public function viewasset(Request $request)
    {
        $engineer = $request->EngineerId;
        $data = DB::table('engineer_master')
                ->join('engineer_asset','engineer_asset.EngineerId','=','engineer_master.EngineerId')
                ->leftJoin('asset_category_master','asset_category_master.AssetCategoryId','=','engineer_asset.AssetCategoryId')
                ->where('engineer_asset.EngineerId', $engineer)
                ->where('engineer_asset.EngineerAssetStatus',1)
                ->select('engineer_asset.*','asset_category_master.AssetCategoryName')->get();
        return view('engineermaster.view_asset', compact('data'));
    }

    public function viewperformance(Request $request)
    {
        $engineer = $request->EngineerId;
        $data1 = DB::table('engineer_performance_point')
                 ->leftJoin('service_master','service_master.EngineerId', '=', 'engineer_performance_point.EngineerId')
                 ->where('engineer_performance_point.EngineerId', $engineer)
                 ->where('service_master.ServiceStatusId',6)
                 ->get();

        return view('engineermaster.view_performance', compact('data1'));
    }

    public function viewprofile(Request $request)
    {
        $engineer = $request->EngineerId;
        $data = DB::table('engineer_master')
                ->where('EngineerId',$engineer)
                ->where('EngineerStatus',1)
                ->get();
        return view('engineermaster.image', compact('data'));

    }

    public function login(Request $request)
    {
        $validator = $this->validateUser($request->data);

        if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(), 422);
        }
        else
        {
            $data = DB::table('engineer_master')
            ->join('engineer_designation_master', 'engineer_designation_master.EngineerDesignationId', '=', 'engineer_master.EngineerDesignation')
            ->select('engineer_master.*', 'engineer_designation_master.EngineerDesignationName', 'engineer_designation_master.EngineerDesignationTA')
            ->where('EngineerStatus', 1)
            ->where('EngineerEmail', $request->data['EngineerEmail'])
            ->get();

            if(count($data) > 0)

            {
                if(Hash::check(($request->data['EngineerPassword']), $data[0]->EngineerPassword))
                {
                    return $this->CommonController->successResponse($data,'Data Fetch Successfully',200);
                }
                else
                {
                    return $this->CommonController->errorResponse('Password is incorrect', 201);
                }

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
                                       'EngineerEmail' => 'required|string|email|max:255',
                                       'EngineerPassword' => 'required|string|min:6', ]);
    }

    public function updateFcmToken(Request $request)
    {

        DB::table('engineer_master')->where('EngineerId', $request->EngineerId)
            ->update(['fcm_token' => $request->token]);

        echo "Success";
        exit;
    }
}

