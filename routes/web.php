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

Route::get('/', 'PagesController@home');
// Route::get('/builders-risk', 'PagesController@buildersrisk');
Route::get('/contractors-equipment', 'PagesController@contractorsequipment');

Route::get('/transportation/search', 'SearchController@index');
Route::get('/transportation/autocompletedot_number', 'SearchController@autocompleteDotNumber');
Route::get('/transportation/{transportation}/download', 'TransportationSubmissionsController@download');
Route::get('/transportation/{transportation}/download_binder', 'TransportationSubmissionsController@downloadBinder');
Route::get('/transportation/{transportation}/download_policy', 'TransportationSubmissionsController@downloadPolicy');
Route::get('/transportation/{transportation}/download_certificates', 'TransportationSubmissionsController@downloadCertificates');
Route::get('/transportation/{transportation}/download_invoice', 'TransportationSubmissionsController@downloadInvoice');
Route::post('/transportation/{transportation}/addFile', 'TransportationSubmissionsController@addFile');
Route::get('/transportation/{transportationFile}/downloadFile', 'TransportationSubmissionsController@downloadFile')->name('transportation.downloadFile');
Route::delete('/transportation/{transportationFile}/deleteFile', 'TransportationSubmissionsController@deleteFile')->name('transportation.deleteFile');


Route::post('/transportation/{transportation}/bind', 'TransportationSubmissionsController@bind');
Route::post('/transportation/{transportation}/bindRequest', 'TransportationSubmissionsController@bindRequest');
Route::post('/transportation/{transportation}/quote', 'TransportationSubmissionsController@quote');
Route::post('/transportation/{transportation}/quoteRequest', 'TransportationSubmissionsController@quoteRequest');
Route::post('/transportation/{transportation}/underwriting', 'TransportationSubmissionsController@saveUnderwriting');
Route::post('/transportation/{transportation}/rates', 'TransportationSubmissionsController@saveRates');

Route::resource('transportation', 'TransportationSubmissionsController');

Route::post('/transportation/{transportation}/vehicles', 'VehiclesController@store');
Route::post('/transportation/{transportation}/trailers', 'TrailersController@store');
Route::post('/transportation/{transportation}/drivers', 'DriversController@store');

Route::get('/vehicles/{vehicle}', 'VehiclesController@vinCrashDetails');

Route::resource('builders-risk', 'BuildersRisksController');
Route::get('/builders-risk/{buildersRisk}/download_app', 'BuildersRisksController@downloadApp');

Route::post('/builders-risk/{buildersRisk}/addFile', 'BuildersRisksController@addFile');
Route::post('/builders-risk/{buildersRisk}/bind', 'BuildersRisksController@bind');
Route::post('/builders-risk/{buildersRisk}/bindRequest', 'BuildersRisksController@bindRequest');
Route::post('/builders-risk/{buildersRisk}/quote', 'BuildersRisksController@quote');
Route::post('/builders-risk/{buildersRisk}/quoteRequest', 'BuildersRisksController@quoteRequest');
Route::get('/builders-risk/{buildersRiskFile}/downloadFile', 'BuildersRisksController@downloadFile')->name('buildersRisk.downloadFile');
Route::delete('/builders-risk/{buildersRiskFile}/deleteFile', 'BuildersRisksController@deleteFile')->name('buildersRisk.deleteFile');

Route::resource('equipment', 'EquipmentController');

Route::get('/equipment/{equipment}/download_app', 'EquipmentController@downloadApp');
Route::post('/equipment/{equipment}/addFile', 'EquipmentController@addFile');
Route::post('/equipment/{equipment}/bind', 'EquipmentController@bind');
Route::post('/equipment/{equipment}/bindRequest', 'EquipmentController@bindRequest');
Route::post('/equipment/{equipment}/quote', 'EquipmentController@quote');
Route::post('/equipment/{equipment}/quoteRequest', 'EquipmentController@quoteRequest');
Route::get('/equipment/{equipmentFile}/downloadFile', 'EquipmentController@downloadFile')->name('equipment.downloadFile');
Route::delete('/equipment/{equipmentFile}/deleteFile', 'EquipmentController@deleteFile')->name('equipment.deleteFile');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
