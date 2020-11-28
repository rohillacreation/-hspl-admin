<?php

namespace App\Http\Controllers;

use App\WorkMaster;
use App\MachineCategoryMaster;
use App\MachineSubCategoryMaster;
use App\MachineMaster;
use App\TechnicalDescription;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Route;
use Session;
use File;


class TechnicalDescriptionController extends Controller
{
    public function __construct(Request $request)
    {     
        $this->CommonController = new CommonController();
    }


    public function index()
    {
      $data = DB::table('technical_description')
              ->join('work_master','work_master.WorkId', '=','technical_description.WorkId')
              ->join('machine_category_master','machine_category_master.MachineCategoryId', '=','technical_description.MachineCategoryId')
              ->join('machine_subcategory_master','machine_subcategory_master.MachineSubcategoryId', '=','technical_description.MachineSubcategoryId')
              ->join('machine_master','machine_master.MachineId', '=','technical_description.MachineId')
              ->where('technical_description.DescriptionStatus',1)
              ->orderBy('technical_description.DescriptionId', 'desc')
              ->get();

      return view('technicaldescription.index',compact('data'));
    }

   
    public function create()
    {
        $MachineCategory = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        $WorkMaster = WorkMaster::where('WorkStatus',1)->get();
        return view('technicaldescription.add_tech_desc',compact('MachineCategory','WorkMaster'));
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([   
                                             'FileType'=>['required'],
                                             'MachineType' => ['required'],
                                             'MachineSubcategoryId' => ['required'],
                                             'MachineId' => ['required'],
                                             'DescriptionTitle' => ['required', 'string', 'max:255'],
                                             'DescriptionFile' => ['required', 'mimes:pdf', 'max:10240'], ]);

        $DescriptionFile = $this->CommonController->upload_image($request->file('DescriptionFile'), "DescriptionFile");
        for($i = 0; $i < count($request->MachineId); $i++)
        {
          TechnicalDescription::insert([ 
                                       'WorkId'=>$request->FileType,
                                       'MachineCategoryId' => $request->MachineType,
                                       'MachineSubcategoryId' => $request->MachineSubcategoryId,
                                       'MachineId' => $request->MachineId[$i],
                                       'DescriptionTitle' => $request->DescriptionTitle,
                                       'DescriptionFile' => $DescriptionFile ]);
        }

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('TechnicalDescriptionController@index');
    }

    public function show(TechnicalDescription $technicalDescription)
    {
        //
    }

    public function edit($DescriptionId)
    {
        $data = TechnicalDescription::where('DescriptionId',$DescriptionId)->get();
        $MachineCategory = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        $WorkMaster = WorkMaster::where('WorkStatus',1)->get();
        
        return view('technicaldescription.edit_tech_desc', compact('data', 'MachineCategory', 'WorkMaster'));
    }

    
    public function update(Request $request, $DescriptionId)
    {   
        $validatedData = $request->validate([
                                             'FileType'=> ['required'],
                                             'MachineType' => ['required'],
                                             'MachineSubcategoryId' => ['required'],
                                             'MachineId' => ['required'],
                                             'DescriptionTitle' => ['required', 'string', 'max:255'], ]);

        $DescriptionFile = $request->file('DescriptionFile');

        if($DescriptionFile == '')
        {
           DB::table('technical_description')
           ->where('DescriptionId', $DescriptionId)
            ->update([
                      'WorkId'=>$request->FileType,
                      'MachineCategoryId' => $request->MachineType,
                      'MachineSubcategoryId' => $request->MachineSubcategoryId,
                      'MachineId' => $request->MachineId,
                      'DescriptionTitle' => $request->DescriptionTitle ]);
        }
        else
        {
            $validatedData = $request->validate(['DescriptionFile' => ['mimes:pdf','max:10240'] ]);
            $data = TechnicalDescription::where('DescriptionId', $DescriptionId)->get();
            $image_path = public_path('/images/DescriptionFile/'.$data[0]->DescriptionFile);

            if(File::exists($image_path)) 
            {
                File::delete($image_path);
            }

            $DocumentsName = $this->CommonController->upload_image($DescriptionFile, "DescriptionFile");

            DB::table('technical_description')
            ->where('DescriptionId', $DescriptionId)
            ->update([
                      'WorkId'=>$request->FileType,
                      'MachineCategoryId' => $request->MachineType,
                      'MachineSubcategoryId' => $request->MachineSubcategoryId,
                      'MachineId' => $request->MachineId,
                      'DescriptionTitle' => $request->DescriptionTitle,
                      'DescriptionFile' => $DocumentsName ]);
        }

        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('TechnicalDescriptionController@index');
    }

    public function destroy($DescriptionId)
    {
        DB::table('technical_description')
        ->where('DescriptionId',$DescriptionId)
        ->update(['DescriptionStatus' => 0]);
        
        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('TechnicalDescriptionController@index');
    }

    //APIs
    public function FetchTechnicalData(Request $request)
    {
      
          $validatorcategory=$this->validatecategory($request->data);

        if($validatorcategory->fails())
        {
            return $this->CommonController->errorResponse($validatorcategory->messages(), 422);
        }
        else
        {
          if($request->data['type']=='machine category')
          {
            $MachineCategory=  DB::table('technical_description')
            ->where('DescriptionStatus',1)
            ->where('MachineCategoryId',$request->data['MachineCategoryId'])
            ->get();
                 if(count($MachineCategory) > 0)
                {
                    return $this->CommonController->successResponse($MachineCategory,'Your Data Fetched Successfully',200);
                }
                else
                {
                    return $this->CommonController->errorResponse('No Data Found',422);
                }
        }
        elseif($request->data['type']=='machine subcategory') 
          {
            $MachineSubcategory = DB::table('technical_description')
            ->where('DescriptionStatus',1)
            ->where('MachineSubcategoryId',$request->data['MachineSubcategoryId'])
            ->get();

            if(count($MachineSubcategory) > 0)
            {
              return $this->CommonController->successResponse($MachineSubcategory,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
        
          elseif($request->data['type']=='machine') 
          {
            $Machine = DB::table('technical_description')
            ->where('DescriptionStatus',1)
            ->where('MachineId',$request->data['MachineId'])
            ->get();

            if(count($Machine) > 0)
            {
              return $this->CommonController->successResponse($Machine,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }

          elseif($request->data['type']=='work') 
          {
            $Work = DB::table('technical_description')
            ->where('DescriptionStatus',1)
            ->where('WorkId',$request->data['WorkId'])
            ->get();

            if(count($Work) > 0)
            {
              return $this->CommonController->successResponse($Work,'Your Data Fetched Successfully',200);
            }
            else
            {
              return $this->CommonController->errorResponse('No Data Found',422);
            }
          }
          
          else
          {
            return $this->CommonController->errorResponse('type Mismatch',422);
          }
        }
    }


        public function validatecategory($data)
        
        {
            return Validator::make($data, [
                                           'type' => 'required',
                                           'MachineCategoryId' => 'required_if:type,"machine category"',
                                           'MachineSubcategoryId' => 'required_if:type,"machine subcategory"',
                                           'MachineId' => 'required_if:type,"machine"',
                                           'WorkId' => 'required_if:type,"work"' ]);
        }

        
}
