<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('install',['as' => 'blog', 'uses' => 'InstallController@index']);
Route::get('purchase_code',['as' => 'blog', 'uses' => 'InstallController@purchasecode']);
Route::post('purchase/check',['as' => 'blog', 'uses' => 'InstallController@checkpurchasecode']);
Route::post('install/setsite',['as' => 'blog', 'uses' => 'InstallController@setsite']);
Route::get('install/database',['as' => 'blog', 'uses' => 'InstallController@database']);
Route::post('install/database',['as' => 'blog', 'uses' => 'InstallController@databaseprocess']);
Route::get('install/timezone',['as' => 'blog', 'uses' => 'InstallController@timezone']);
Route::get('install/site',['as' => 'blog', 'uses' => 'InstallController@site']);
Route::get('install/done',['as' => 'blog', 'uses' => 'InstallController@done']);
Route::get('/', function () {
    return redirect('install');
});
