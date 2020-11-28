<?php

namespace App\Http\Controllers;

use App\OrganisationMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Session;
use Route;

class OrganisationMasterController extends Controller
{
    public function index()
    {   
        $data = OrganisationMaster::where('OrganisationStatus',1)->get();
        return view('organisationmaster.index', compact('data'));
    }

    
    public function create()
    {
        return view('organisationmaster.add_organisation');
    }

    
    public function store(Request $request)
    {
        $validatedata=$request->validate([
                                         'OrganisationName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255','unique:organisation_master'],
                                         ]);

        OrganisationMaster::insert(['OrganisationName'=>$request->OrganisationName]);
        Session::flash('message','Your Data Save Successfully');
        return redirect()->action('OrganisationMasterController@index');
    }

    
    public function show()
    {
        //
    }

    
    public function edit($OrganisationId)
    {   
        $data = OrganisationMaster::where('OrganisationId',$OrganisationId)->get();
        return view('organisationmaster.edit_organisation',compact('data'));
    }

   
    public function update(Request $request, $OrganisationId)
    {
        $validatedata = $request->validate([
                                    'OrganisationName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255'], ]);

        DB::table('organisation_master')
        ->where('OrganisationId',$OrganisationId)
        ->update(['OrganisationName'=>$request->OrganisationName]);

        Session::flash('message','Your Data Updated Successfully');
        return redirect()->action('OrganisationMasterController@index');

    }

    
    public function destroy($OrganisationId)
    {
        DB::table('organisation_master')
        ->where('OrganisationId',$OrganisationId)
        ->update(['OrganisationStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('OrganisationMasterController@index');
    }
}
