<?php

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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('bulk/sms','BulkSMSController@index');

Route::get('bulk/import/csv','CsvImportController@create');

Route::post('bulk/import/csv/upload','CsvImportController@Store');

Route::get('bulk/sms/send','BulkSMSController@bulkSms');

Route::resource('user','UserController');

Route::resource('states','StateController');

Route::resource('templates','TemplateController');

// Route::get('bulk/import/excel','BulkSMSController@importExcel');
//
// Route::get('bulk/export/csv','BulkSMSController@exportCsv');
//
// Route::get('bulk/export/excel','BulkSMSController@exportExcel');
