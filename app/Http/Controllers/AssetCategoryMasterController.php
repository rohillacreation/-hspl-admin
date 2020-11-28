<?php

namespace App\Http\Controllers;

use App\AssetCategoryMaster;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use App\Http\Controllers\CommonController;


class AssetCategoryMasterController extends Controller
{   
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }
   
    public function index()
    {
        $data= AssetCategoryMaster::where('AssetCategoryStatus',1)->get();
        return view('assetcategorymaster.index',compact('data'));
       
    }

   
    public function create()
    {
        return view('assetcategorymaster.add_asset_categorymaster');
       
    }

   
    public function store(Request $request)
    {
    $validateData= $request->validate(['AssetCategoryName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/','min:2','max:255'] ]);                     
    AssetCategoryMaster::insert(['AssetCategoryName'=>$request->AssetCategoryName]);
    Session::flash('message', 'Your Data save Successfully');
    return redirect()->action('AssetCategoryMasterController@index');

    }
   

   
    public function show(AssetCategoryMaster $assetCategoryMaster)
    {
        //
    }

   
    public function edit($AssetCategoryId)
    {
        $data= AssetCategoryMaster::where('AssetCategoryId',$AssetCategoryId)->get();
        return view('assetcategorymaster.Edit_asset_categorymaster',compact('data'));
       
    }

   
    public function update(Request $request,$AssetCategoryId)
    {
       $validateDate= $request->validate(['AssetCategoryName'=>['required','regex:/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-,])*$/','min:2','max:255'] ]);

         DB::table('asset_category_master')
         ->where('AssetCategoryId',$AssetCategoryId)
         ->update(['AssetCategoryName'=>$request->AssetCategoryName ]);
         Session::flash('message','Your Data Updated Successfully');
         return redirect()->action('AssetCategoryMasterController@index');
    }

   
    public function destroy($AssetCategoryId)
    {
        DB::table('asset_category_master')
        ->where('AssetCategoryId',$AssetCategoryId)
        ->update(['AssetCategoryStatus'=>0 ]);
        Session::flash('message','Your Data Deleted Successfully');
        return redirect()->action('AssetCategoryMasterController@index');
    }

    public function FetchAllAssetCategory(Request $request)
    {
        $assetcategory = AssetCategoryMaster::All()->where('AssetCategoryStatus',1);
        return $this->CommonController->successResponse($assetcategory,'Data Fetch Successfully',200); 
    }
}