<?php

namespace App\Http\Controllers;

use App\EngineerMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use File;
use Illuminate\Support\Facades\Hash;
use Carbon;

class LocationController extends Controller
{   

	public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }

    
    public function store(Request $request)
    {
        $validator = $this->validateUser($request->data);

        if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(), 422);
        }
        else
        {   
        	$data = DB::table('user_location')->orderBy('LocationId','desc')->first();
        	if($data)
        	{
        		$time = (strtotime(date('Y-m-d H:i:s')) - strtotime($data->created_at))/3600;
        		if($time > 1)
        		{
        			$insert =  DB::table('user_location')
                               ->insert(['EngineerId'=>$request->data['EngineerId'],
                                         'Latitude'=>$request->data['Latitude'],
                                         'Longitude'=>$request->data['Longitude'] ]);
        		}
        		else
        		{
        			$insert =  DB::table('user_location')
        						->where('LocationId', $data->LocationId)
        						->update(['EngineerId' => $request->data['EngineerId'],
		                                  'Latitude'=>$request->data['Latitude'],
		                                  'Longitude'=>$request->data['Longitude'] ]);
        		}
        	}
        	else
        	{
        		$insert =  DB::table('user_location')
                           ->insert(['EngineerId'=>$request->data['EngineerId'],
		                             'Latitude'=>$request->data['Latitude'],
		                             'Longitude'=>$request->data['Longitude'] ]);
        	}
            
            if($insert)
            { 
                return $this->CommonController->successResponse($insert,'Data Insert Successfully',200);
            }
            else
            {
                return $this->CommonController->errorResponse('Data Not Inserted', 201);
            }
        }
    }

    public function validateUser($data)
    {
        return Validator::make($data, [
                                       'EngineerId'=> 'required',
                                       'Latitude' => 'required',
                                       'Longitude' => 'required' ]);
    }
}
