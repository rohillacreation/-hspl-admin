<?php

namespace App\Http\Controllers;

use App\UserDesignationMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;

class UserDesignationMasterController extends Controller
{
    
    public function index()
    {
        $data = UserDesignationMaster::where('UserDesignationStatus', 1)->get();
        return view('user_desinations.index', compact('data'));
    }

    public function create()
    {
        return view('user_desinations.add_userdesignation');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'UserDesignationName' => ['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255', 'unique:users_designation_master'] ]);

        UserDesignationMaster::insert(['UserDesignationName' => $request->UserDesignationName]);

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('UserDesignationMasterController@index');

    }

    public function show(UserDesignationMaster $userDesignationMaster)
    {
        //
    }

    public function edit($UserDesignationId)
    {
        $data = UserDesignationMaster::where('UserDesignationId', $UserDesignationId)->get();
        return view('user_desinations.edit_userdesignation', compact('data'));
        
            
    }

    public function update(Request $request, $UserDesignationId)
    {
        $validatedData = $request->validate([ 'UserDesignationName' => ['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2', 'max:255'] ]);

        DB::table('users_designation_master')
        ->where('UserDesignationId', $UserDesignationId)
        ->update(['UserDesignationName' => $request->UserDesignationName]);
        Session::flash('message', 'Your Data update Successfully');

        return redirect()->action('UserDesignationMasterController@index');
    }

    public function destroy($UserDesignationId)
    {
        DB::table('users_designation_master')->where('UserDesignationId', $UserDesignationId)
        ->update(['UserDesignationStatus' => 0]);
        
        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('UserDesignationMasterController@index');
    }
}
