<?php

namespace App\Http\Controllers;

use App\EngineerAsset;
use App\EngineerMaster;
use App\AssetCategoryMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use Auth;

class EngineerAssetController extends Controller
{
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }

    public function index()
    {
       
            $data = DB::table('engineer_asset')
            ->join('engineer_master', 'engineer_asset.EngineerId', '=', 'engineer_master.EngineerId')
            ->join('asset_category_master', 'asset_category_master.AssetCategoryId', '=', 'engineer_asset.AssetCategoryId')
            ->select('engineer_asset.*', 'engineer_master.EngineerId', 'engineer_master.EngineerName', 'asset_category_master.AssetCategoryId', 'asset_category_master.AssetCategoryName')
            ->where('engineer_master.AssignTo', Auth()->User()->id)
            ->where('engineer_asset.EngineerAssetStatus',1)
            ->orderBy('engineer_asset.AssetId', 'desc')
            ->get();
            
            return view('engineerasset.index',compact('data'));
    }

    
    public function create()
    {  
       $data=EngineerMaster::where('EngineerStatus',1)->get();
       $data1=AssetCategoryMaster::where('AssetCategoryStatus',1)->get();
       $data2=EngineerAsset::where('EngineerAssetStatus',1)->get();
       return view('engineerasset.add_engineer_asset',compact('data','data1','data2'));   
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                                            'EngineerId' => ['required'],
                                            'AssetCategoryId' => ['required'],
                                            'AssignDate' => ['required'],
                                            'ItemSerialNo' => ['required', 'string','min:1','max:255'],
                                            'ItemDescription' => ['required', 'string', 'max:255'],
                                            'ItemPrice' => ['required', 'numeric', 'min:1'],  ]);

        
        EngineerAsset::insert(['EngineerId' => $request->EngineerId,
                                'AssetCategoryId' => $request->AssetCategoryId,
                                'AssignDate' => $request->AssignDate,
                                'ItemSerialNo' => $request->ItemSerialNo,
                                'ItemDescription' => $request->ItemDescription,
                                'ItemPrice' => $request->ItemPrice, ]);

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('EngineerAssetController@index');

    }

   
    public function show(EngineerAsset $engineerAsset)
    {
        //
    }

    
    public function edit($AssetId)
    {
        $data1 = EngineerMaster::where('EngineerStatus',1)->get();
        $data2 = AssetCategoryMaster::where('AssetCategoryStatus',1)->get();
        $data = EngineerAsset::where('AssetId',$AssetId)->get();
        return view('engineerasset.edit_engineer_asset', compact('data', 'data1','data2'));
    }

    
    public function update(Request $request, $AssetId)
    {    
         $validatedData = $request->validate([
                                              'EngineerId' => ['required'],
                                              'AssetCategoryId' => ['required'],
                                              'AssignDate' => ['required'],
                                              'ItemSerialNo' => ['required', 'string', 'max:255','min:1'],
                                              'ItemDescription' => ['required', 'string', 'max:255',],
                                              'ItemPrice' => ['required', 'regex:/^\d+(\.\d{1,2})?$/','min:1'],
                                                
                                            ]);

         DB::table('engineer_asset')
         ->where('AssetId',$AssetId)
         ->update(['EngineerId' => $request->EngineerId,
                   'AssetCategoryId' => $request->AssetCategoryId,
                   'AssignDate' => $request->AssignDate,
                   'ItemSerialNo' => $request->ItemSerialNo,
                   'ItemDescription' => $request->ItemDescription,
                   'ItemPrice' => $request->ItemPrice ]);

         Session::flash('message', 'Your Data Updated Successfully');
         return redirect()->action('EngineerAssetController@index');
    }

   
    public function destroy($AssetId)
    {
        DB::table('engineer_asset')->where('AssetId', $AssetId)
        ->update(['EngineerAssetStatus' => 0]);
        Session::flash('message', 'Delete Successfully');
        return redirect()->action('EngineerAssetController@index');
    }

    public function AssetFetchByEnggId(Request $request)
    {
      $validator = $this->validateUser($request->data);

      if ($validator->fails()) 
      {
        return $this->CommonController->errorResponse($validator->messages(), 422);
      }
      else
      {
        $data = DB::table('engineer_asset')
            ->join('asset_category_master','asset_category_master.AssetCategoryId', '=', 'engineer_asset.AssetCategoryId')
            ->where('EngineerAssetStatus', 1)
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
    public function validateUser($data)
    
    {
        return Validator::make($data, [
                                       'EngineerId' => 'required']);
    }
}
