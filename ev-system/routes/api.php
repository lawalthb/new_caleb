<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'ApiController@index');
Route::post('/login', 'ApiController@login');
Route::get('/current', 'ApiController@current_user');

Route::post('/search-chat', 'ApiController@search_chat');
Route::post('/store-reply', 'ApiController@store_reply');
Route::post('/friend-request', 'ApiController@friend_request');
Route::post('/accept-request', 'ApiController@accept_request');
Route::post('/seen-messages', 'ApiController@seen_messages');
Route::post('/select-attendance', 'ApiController@select_attendance');
Route::post('/take-attendance', 'ApiController@take_attendance');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/messages/{id}', 'ApiController@messages');
    Route::get('/students', 'ApiController@view_students');
    Route::get('/parent-students/{id}', 'ApiController@view_parent_students');
    Route::get('/student-by-class/{id}', 'ApiController@view_student_by_class');
    Route::get('/classes', 'ApiController@view_classes');
    Route::get('/schools', 'ApiController@schools');
    Route::get('/blogs', 'ApiController@blogs');
    Route::get('/notifications', 'ApiController@notifications');
    Route::get('/teachers', 'ApiController@teachers');
    Route::get('/parents', 'ApiController@parents');
    Route::get('/subjects', 'ApiController@subjects');
    Route::get('/invoices', 'ApiController@invoices');
    Route::get('/expenses', 'ApiController@expenses');
    Route::get('/exams', 'ApiController@exams');
    Route::get('/sections', 'ApiController@sections');
    Route::get('/hostels', 'ApiController@hostels');
    Route::post('/select-mark', 'ApiController@select_mark');
    Route::post('/submit-mark', 'ApiController@submit_mark');
    Route::post('/student/view-mark', 'ApiController@view_mark');
    Route::get('/student/invoices/{id}', 'ApiController@student_invoices');
    Route::post('/student/materials', 'ApiController@materials');
    Route::post('/student/get-routine', 'ApiController@get_routine');
    Route::post('/student/get-parent-routine', 'ApiController@get_parent_routine');
    Route::post('/student/get-promotions', 'ApiController@get_promotions');
    Route::post('/edit-profile', 'ApiController@edit_profile');
    Route::post('/store-student', 'ApiController@store_student');

});

