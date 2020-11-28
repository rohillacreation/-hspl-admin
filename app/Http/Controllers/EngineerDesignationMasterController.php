<?php

namespace App\Http\Controllers;
//use App\UserDesignationMaster;
use App\EngineerDesignationMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Session;
use Route;

class EngineerDesignationMasterController extends Controller
{
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }
    
    public function index()
    {
        $data = EngineerDesignationMaster::where('EngineerDesignationStatus',1)->get();
        return view('engineerdesignationmaster.index',compact('data'));
    }

    
    public function create()
    {
        return view('engineerdesignationmaster.add_engineer_designation_master');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request
        ->validate([
                    'EngineerDesignationName' => ['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255','unique:engineer_designation_master'],
                    'EngineerDesignationTA' => ['required', 'numeric'] ]);

        EngineerDesignationMaster::insert(['EngineerDesignationName' => $request->EngineerDesignationName,
                                           'EngineerDesignationTA' => $request->EngineerDesignationTA ]);

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('EngineerDesignationMasterController@index');
    }

    
    public function show(EngineerDesignationMaster $engineerDesignationMaster)
    {
        //
    }

    
    public function edit($EngineerDesignationId)
    {
        $data = EngineerDesignationMaster::where('EngineerDesignationId', $EngineerDesignationId)->get();
        return view('engineerdesignationmaster.edit_engineer_designation_master', compact('data'));
    }


    public function update(Request $request, $EngineerDesignationId)
    {
        $validatedData = $request->validate([
            'EngineerDesignationName' => ['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255'],
            'EngineerDesignationTA' => ['required', 'numeric']
        ]);
        DB::table('engineer_designation_master')
        ->where('EngineerDesignationId', $EngineerDesignationId)
        ->update([
                  'EngineerDesignationName' => $request->EngineerDesignationName,
                  'EngineerDesignationTA' => $request->EngineerDesignationTA ]);

        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('EngineerDesignationMasterController@index');
    }

    
    public function destroy($EngineerDesignationId)
    {
        DB::table('engineer_designation_master')->where('EngineerDesignationId', $EngineerDesignationId)
        ->update(['EngineerDesignationStatus' => 0]);
        Session::flash('message', 'Your Data Deleted Successfully');
        return redirect()->action('EngineerDesignationMasterController@index');
    }

    public function FetchAllDesignations(Request $request)
    {
        $DesignationData=EngineerDesignationMaster::All()->where('EngineerDesignationStatus',1);
        return $this->CommonController->successResponse($DesignationData,' Data  succesfuly',200);


    }
}