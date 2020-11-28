<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Dashboard Route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/AllUsers', 'HomeController@all_users');
Route::get('/Users/{id}/edit', 'HomeController@edit');
Route::post('/update/{id}', 'HomeController@update');
Route::get('/Users/{id}/delete', 'HomeController@delete');
//Forget Password
Route::post('/reset_password/send_otp', 'auth\ResetPasswordController@send_otp');
Route::post('/reset_password/verify_otp', 'auth\ResetPasswordController@verify_otp');
Route::post('/new_password', 'auth\ResetPasswordController@new_password');


//User Designation Master Route
Route::resource('/user-designations', 'UserDesignationMasterController');
//Engineer Designation Master Route
Route::resource('/engineer-designation-master', 'EngineerDesignationMasterController');
//Engineer Designation APIs
Route::get('/engineerdesignation','EngineerDesignationMasterController@FetchAllDesignations');
//Engineers Route
Route::resource('/engineer-master', 'EngineerMasterController');
Route::post('/engineer-master/view_asset', 'EngineerMasterController@viewasset');
Route::post('/engineer-master/view_profile', 'EngineerMasterController@viewprofile');
Route::post('/engineer-master/view_performance', 'EngineerMasterController@viewperformance');
//Engineers APIs
Route::post('/engineerlogin', 'EngineerMasterController@login');
//Asset category Master Route
Route::resource('/asset-category-master', 'AssetCategoryMasterController');
//Asset Category Master APIs
Route::get('/assetcategoryfetch','AssetCategoryMasterController@FetchAllAssetCategory');
//Engineer Asset Route
Route::resource('/engineer-asset', 'EngineerAssetController');
//Engineer Asset APIs
Route::post('/engineerassetfetch','EngineerAssetController@AssetFetchByEnggId');
//Leave Management Route
Route::resource('/leave-management', 'LeaveManagementController');
Route::post('/leave-management/approval', 'LeaveManagementController@approval');
Route::post('/leave-management/rejectleave', 'LeaveManagementController@rejectleave');
//Leave Management APIs
Route::post('/engineersonleave','LeaveManagementController@FetchallEngineerOnLeave');
//Leave Management Delete APIs
Route::post('/deleteleavestatus','LeaveManagementController@DeleteEngineerOnLeave');
//Machine Category Master Route
Route::resource('/machine-category-master', 'MachineCategoryMasterController');
//Machine Category Master APIs
Route::get('/machinecategoryfetch','MachineCategoryMasterController@FetchAllMachineCategory');
//Machine SubCategory Master Route
Route::resource('/machine-sub-category-master','MachineSubCategoryMasterController');
//Machine SubCategory APIs
Route::post('/machinesubcategoryfetch','MachineSubCategoryMasterController@FetchByMachineCategoryId');
//Railways Master Route
Route::resource('/railways-master','RailwaysMasterController');

//Railways APIs
Route::get('/fetchallrailways','RailwaysMasterController@FetchAllRailway');
//Division Master Route
Route::resource('/division-master','DivisionMasterController');
//Division Master APIs
Route::post('/divisiondatafetch','DivisionMasterController@FetchByDivisionId');
//Machine Master Route
Route::resource('/machine-master','MachineMasterController');
Route::post('/machine-master/getsubcategory','MachineMasterController@getsubcategory');
Route::Post('/machine-master/get-division','MachineMasterController@get_division');
//Machine Master APIs
Route::post('/fetchmachinedata','MachineMasterController@FetchMachineData');
//Catalog Master Route
Route::resource('/catalog-master','CatalogMasterController');
Route::post('/catalog-master/getsubcategory','CatalogMasterController@getsubcategory');
Route::post('/catalog-master/getmachinecategory','CatalogMasterController@getmachinecategory');
//Catalog Master APIS
Route::post('/fetchcatalogdetails','CatalogMasterController@FetchCatalogDetails');
//Work Master Route
Route::resource('/work-master', 'WorkMasterController');
//Conveyance Master Route
Route::resource('/conveyance-master', 'ConveyanceMasterController');
//Conveyance Master APIs
Route::get('/Fetchconveyancedetails', 'ConveyanceMasterController@fetchAllConveyance');
//Technical Description Route
Route::resource('/technical-description', 'TechnicalDescriptionController');
//Technical Description APIs
Route::post('/fetchtechnicaldata','TechnicalDescriptionController@FetchTechnicalData');
//Engineer On Site Route
Route::resource('/engineer-onsite','EngineerOnSiteController');
//Service Master Route
Route::resource('/service-master','ServiceMasterController');
Route::post('/service-master/get-railways','ServiceMasterController@getrailways');
Route::post('/service-master/select_engineer','ServiceMasterController@select_engineer');
Route::post('/service-master/assign','ServiceMasterController@assign');
Route::post('/service-master/performance_point','ServiceMasterController@performancepoint');
Route::post('/service-master/addperformance','ServiceMasterController@add_performance');
Route::post('/overbudgetapproval','ServiceMasterController@overbudgetapproval');
Route::post('/service-master/budgetapproval','ServiceMasterController@budgetapproval');
//Service Accept/Reject APIs
Route::post('/service_acceptreject','ServiceMasterController@acceptreject');
//Service FetchServices APIs
Route::post('/fetchservice','ServiceMasterController@fetchservices');
//this route is for adding service details Api
Route::post('/service_details','ServiceMasterController@ServiceComplete');
Route::post('/service_final_complete','ServiceMasterController@ServiceFinalComplete');
Route::post('/service_update/{id}','ServiceMasterController@update_service');
Route::post('/service_final_update/{id}','ServiceMasterController@ServiceFinalUpdateComplete');
//this route is for fetch service details
Route::post('/service_details_fetch','ServiceMasterController@fetchservicedetail');
//this route is for fetch final submit service details.
Route::post('/final_service_details_fetch','ServiceMasterController@fetchfinalservicedetail');
//this api for expense bill upload
Route::post('/expense_bill_insert','ServiceMasterController@expense_bill_insert');
//Organisation Master Route
Route::resource('/organisation-master','OrganisationMasterController');

//this route is for Engineer performance related apis
Route::resource('/engineerperformance','EngineerPerformanceController');
//this route is for Purchase Order
Route::resource('/purchase_order','POController');
Route::post('/purchase_order/get-division','POController@getdivision');
Route::post('/purchase_order/view_bill','POController@bill');
Route::get('/purchase_order/pdf/{id}','POController@get_POPDF');
//this route is for Gate Pass
Route::resource('gatepass','GatePassController');
Route::post('/gatepass/get-division','GatePassController@getdivision');
Route::post('/gatepass/view_pass','GatePassController@viewpass');
Route::get('/gatepass/pdf/{id}','GatePassController@get_POPDF');
//this route is for Company Master
Route::resource('/companydetails','CompanyMasterController');
//this route is for Reports
Route::get('/reports','ReportsController@index');
Route::post('/reports/view_report','ReportsController@reports');
Route::get('/reports/pdffile/{id}','ReportsController@reportspdffiles');

//this route is for User Location
Route::post('/user_location','LocationController@store');
