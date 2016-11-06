<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/* route for project log viewer*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
/* route for login*/
Route::get('/','BaseController@showLogin');
Route::get('login','BaseController@showLogin');
/* route for dashboard*/
Route::get('dashboard','AdminController@dashboard');
/* route to view users*/
Route::get('Users/Index','AdminController@viewUsers');
/* route to view edit user*/
Route::get('Users/Edit/{id}','AdminController@editUsers');
/* route to activate/deactivate user*/
Route::get('Users/Activate','AdminController@activateUsers');
/* route to create user*/
//Route::post('auth/createUser','Auth\AuthController@createUsers');
Route::post('auth/createUser','AdminController@createUser');
Route::get('Users/Create','AdminController@createUsers');

Route::post('auth','Auth\AuthController@auth');
Route::get('logout','Auth\AuthController@logout');

/* retrieve regions of a state*/
Route::get('Users/GetRegionByStateId','BaseController@getRegions');

/* route to create user*/
Route::get('ReportInfo/Energy','AdminController@reportInfo');
/* route to customer data*/
Route::get('Customer/CustomerData','AdminController@customerData');
/* route to customer billing*/
Route::get('Customer/CustomerBilling','AdminController@customerBilling');
/* route to map*/
Route::get('Map/Index','AdminController@map');
/* route to change password*/
Route::get('Manage/ChangePassword/{id}','AdminController@changePassword');
/* route to auditTrial*/
Route::get('AuditTrail/Index','AdminController@audit');

Route::get('Users/ManageRole/{id}','AdminController@ManageRole');

Route::get('ReportInfo/UploadSheet','AdminController@uploadMDAEnergyAuditData');
Route::post('ReportInfo/UploadSheet','AdminController@saveMDAEnergyAuditData');
Route::get('Users/ManageRole','AdminController@ManageRole');

Route::post('Users/ChangeAvatar','AdminController@ChangeAvatar');
Route::get('Users/Activate/{status}/{id}','AdminController@changeStatus');
Route::get('admin/users/activate/{id}','AdminController@checkStatus');

Route::get('Users/Profile/Edit/{id}','AdminController@updateProfile');
Route::post('User/UpdatePassword','AdminController@updatePassword');

