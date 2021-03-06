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
Route::post('auth/resetPassword','BaseController@postReset');
Route::post('auth/createUser','AdminController@createUser');
Route::get('Users/Create','AdminController@createUsers');

Route::post('auth','Auth\AuthController@auth');
Route::get('logout','Auth\AuthController@logout');

/* retrieve regions of a state*/
Route::get('Users/GetRegionByStateId','BaseController@getRegions');
Route::get('ReportInfo/GetRegionbyStateId','BaseController@getRegions');
Route::get('ReportInfo/getStateById','BaseController@getStatesInDisco');


Route::get('ReportInfo/GetEnergyAudit','BaseController@getEnergyAudit');
Route::get('ReportInfo/Exporttoexcel','BaseController@exportEnergyAudit');
Route::get('ReportInfo/TruncateReport','AdminController@truncateReport');

Route::get('ReportInfo/getCustomerNote','BaseController@getCustomerNote');
Route::get('ReportInfo/getCustomerNote/{id}','BaseController@getCustomerNoteByDisco');

Route::get('CustomerData/ExportCustomerNote','BaseController@exportCustomerNote');

Route::get('ReportInfo/getCustomerBill','BaseController@getCustomerBill');
Route::get('CustomerData/ExportCustomerBill','BaseController@exportCustomerBill');
Route::get('Customer/DeleteCustomerBill/{id}','BaseController@deleteCustomerBill');
Route::get('Customer/DeleteCustomerData/{id}','BaseController@deleteCustomerData');

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
Route::post('Users/ManageRole','AdminController@addRole');

Route::post('Users/AssignRegion','AdminController@addRegion');


Route::get('ManageRole/Delete/{id}','AdminController@deleteRole');
Route::get('ManageRegion/Delete/{id}','AdminController@deleteRegion');

Route::get('ReportInfo/UploadSheet','AdminController@uploadMDAEnergyAuditData');
Route::post('ReportInfo/UploadSheet','AdminController@saveMDAEnergyAuditData');

Route::get('Customer/UploadCustomerNote','AdminController@uploadMDACustomerNote');
Route::post('Customer/UploadCustomerNote','AdminController@saveMDACustomerNote');

Route::get('Customer/UploadCustomerBill','AdminController@uploadMDACustomerBill');
Route::post('Customer/UploadCustomerBill','AdminController@saveMDACustomerBill');

Route::get('api/accountinfos','BaseController@accountInfos');
Route::post('Customer/UploadCustomerBill','AdminController@saveMDACustomerBill');


Route::get('Users/ManageRole','AdminController@ManageRole');

Route::post('Users/ChangeAvatar','AdminController@ChangeAvatar');
Route::get('Users/Activate/{status}/{id}','AdminController@changeStatus');
Route::get('admin/users/activate/{id}','AdminController@checkStatus');

Route::get('Customer/Bill/{id}','AdminController@viewCustomerBills');

Route::get('Users/Profile/Edit/{id}','AdminController@updateProfile');
Route::post('User/UpdatePassword','AdminController@updatePassword');

Route::get('Users/Delete/{id}','AdminController@deleteUser');
Route::get('Customer/Bill/Print/{id}/{prev}','AdminController@printBill');

Route::post('reset/password','BaseController@resetPwd');

Route::get('premesis/captured/{id}','AdminController@premesis');
Route::get('disco/amount/owed/{id}','AdminController@owedDisco');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendresetemail','MailController@reset_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
