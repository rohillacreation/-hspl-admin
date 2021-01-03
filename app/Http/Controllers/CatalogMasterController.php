<?php

namespace App\Http\Controllers;

use App\MachineCategoryMaster;
use App\MachineSubCategoryMaster;
use App\MachineMaster;
use App\CatalogMaster;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Route;
use File;

class CatalogMasterController extends Controller
{
     public function __construct(Request $request)
    {
        $this->CommonController = new CommonController();
    }

    public function index()
    {
        $data = DB::table('catalog_master')
                ->join('machine_category_master','machine_category_master.MachineCategoryId', '=', 'catalog_master.MachineCategoryId')
                ->join('machine_subcategory_master','machine_subcategory_master.MachineSubcategoryId', '=', 'catalog_master.MachineSubcategoryId')
                ->join('machine_master','machine_master.MachineId', '=', 'catalog_master.MachineId')
                ->where('catalog_master.CatalogStatus',1)
                ->orderBy('catalog_master.CatalogId', 'desc')
                ->get();

        return view('catalogmaster.index',compact('data'));
    }


    public function create()
    {
        $data = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        return view('catalogmaster.add_catalog_master',compact('data'));

    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
                                            'MachineType' => ['required'],
                                            'MachineSubcategoryId' => ['required'],
                                            'MachineId' => ['required'],
                                            'CatalogDescription' => ['required', 'string', 'max:255'],
                                            'CatalogFile' => ['required','mimes:pdf','max:100240'],
                                            ]);
        $CatalogFile = $this->CommonController->upload_image($request->file('CatalogFile'), "CatalogFile");
        for($i = 0; $i < count($request->MachineId); $i++)
        {
          CatalogMaster::insert([
                               'MachineCategoryId' => $request->MachineType,
                               'MachineSubcategoryId' => $request->MachineSubcategoryId,
                               'MachineId' => $request->MachineId[$i],
                               'CatalogDescription' => $request->CatalogDescription,
                               'CatalogFile' => $CatalogFile ]);
        }

        Session::flash('message', 'Your Data save Successfully');
        return redirect()->action('CatalogMasterController@index');
    }


    public function show(CatalogMaster $catalogMaster)
    {
        //
    }


    public function edit($CatalogId)
    {
        $data = CatalogMaster::where('CatalogId',$CatalogId)->get();
        $data1 = MachineCategoryMaster::where('MachineCategoryStatus',1)->get();
        return view('catalogmaster.edit_catalog_master', compact('data', 'data1'));
    }


    public function update(Request $request, $CatalogId)
    {
        $validatedData = $request->validate([
                                            'MachineType' => ['required'],
                                            'MachineSubcategoryId' => ['required'],
                                            'MachineId' => ['required'],
                                            'CatalogDescription' => ['required', 'string', 'max:255'], ]);

        $CatalogFile = $request->file('CatalogFile');

        if($CatalogFile == '')
        {
           DB::table('catalog_master')->where('CatalogId', $CatalogId)
           ->update([
                     'MachineCategoryId' => $request->MachineType,
                     'MachineSubcategoryId' => $request->MachineSubcategoryId,
                     'MachineId' => $request->MachineId,
                     'CatalogDescription' => $request->CatalogDescription ]);
        }
        else
        {
            $validatedData = $request->validate(['CatalogFile' => ['mimes:pdf','max:10240'] ]);
            $data = CatalogMaster::where('CatalogId', $CatalogId)->get();
            $image_path = public_path('/images/CatalogFile/'.$data[0]->CatalogFile);

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            $DocumentsName = $this->CommonController->upload_image($CatalogFile, "CatalogFile");

            DB::table('catalog_master')->where('CatalogId', $CatalogId)
            ->update([
                        'MachineCategoryId' => $request->MachineType,
                        'MachineSubcategoryId' => $request->MachineSubcategoryId,
                        'MachineId' => $request->MachineId,
                        'CatalogDescription' => $request->CatalogDescription,
                        'CatalogFile' => $DocumentsName ]);
        }

        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('CatalogMasterController@index');
    }


    public function destroy($CatalogId)
    {
        DB::table('catalog_master')
        ->where('CatalogId',$CatalogId)
        ->update(['CatalogStatus' => 0]);
        Session::flash('message', 'Your Data update Successfully');
        return redirect()->action('CatalogMasterController@index');
    }

    public function getsubcategory(Request $request)
    {
      $category_id = $request->category_id;
      return DB::table('machine_subcategory_master')->where('MachineCategoryId', $category_id)->get();
    }

    public function getmachinecategory(Request $request)
    {
      $subcategory_id = $request->subcategory_id;
      return DB::table('machine_master')->where('MachineSubcategoryId', $subcategory_id)->get();
    }

    //fetch catalog details api by machinecategoryid,

    public function FetchCatalogDetails(Request $request)
    {
        $validator=$this->validatedUser($request->data);

        if($validator->fails())
        {
            return $this->CommonController->errorResponse($validator->messages(),422);
        }
        else
        {
          if($request->data['type']=='machine category')
          {
            $CatalogMachineData=  DB::table('catalog_master')
            ->where('CatalogStatus',1)
            ->where('MachineCategoryId',$request->data['MachineCategoryId'])

            ->get();
                 if(count($CatalogMachineData) > 0)
                {
                    return $this->CommonController->successResponse($CatalogMachineData,'Your Data Fetched Successfully',200);
                }
                else
                {
                    return $this->CommonController->errorResponse('No Data Found',422);
                }


          }
           elseif ($request->data['type']=='machine subcategory')
           {

               $CatalogSubcategoryData=  DB::table('catalog_master')
               ->where('CatalogStatus',1)
               ->where('MachineSubcategoryId',$request->data['MachineSubcategoryId'])
               ->get();
                 if(count($CatalogSubcategoryData) > 0)
                {
                    return $this->CommonController->successResponse($CatalogSubcategoryData,'Your Data Fetched Successfully',200);
                }
                else
                {
                    return $this->CommonController->errorResponse('No Data Found',422);
                }
           }
           elseif ($request->data['type']=='machine')
           {

               $CatalogMachineData=  DB::table('catalog_master')
               ->where('CatalogStatus',1)
               ->where('MachineId',$request->data['MachineId'])->get();
                 if(count($CatalogMachineData) > 0)
                {
                    return $this->CommonController->successResponse($CatalogMachineData,'Your Data Fetched Successfully',200);
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

    public function validatedUser($data)
    {

        return Validator::make($data,[
            'type'=>'required',
            'MachineCategoryId'=>'required_if:type,"machine category"',
            'MachineSubcategoryId'=>'required_if:type,"machine subcategory"',
            'MachineId'=>'required_if:type,"machine"'
              ]);
    }
}
