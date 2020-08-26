<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');
Route::middleware('auth:api')->post('/register', 'AuthController@register');
Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

Route::get('/regulations', 'RegulationsController@index');
Route::get('/regulations/{id}', 'RegulationsController@get_regulation');
Route::get('/regulations/{id}/semesters', 'RegulationsController@get_semesters');
Route::get('/regulations/{id}/specializations', 'RegulationsController@get_specializations');
Route::get('/regulations/{regulation_id}/scheme/{semester_id?}', 'RegulationsController@get_instruction_scheme');
Route::get('/regulations/{regulation_id}/subjects/{subject_code?}', 'RegulationsController@get_subjects');

Route::get('/subjects/{id}/ratings', 'SubjectController@get_ratings');
Route::get('/subjects/{id}/syllabus', 'SubjectController@get_syllabus');
Route::post('/subjects/{id}/ratings', 'SubjectController@add_rating');


Route::get('/departments', 'DepartmentController@index');
Route::get('/departments/{id}', 'DepartmentController@show');

Route::get('/students/{key}', 'StudentController@get_students');


Route::get('/regulations/{regulation_code}/specializations', 'RegulationsController@specializations');
Route::post('/regulations/{regulation_code}/specializations', 'RegulationsController@storeSpecializations');

Route::post('/contactus/sendemail', 'EmailController@send_contact_us_email');

Route::post('/import/marks', 'ImportMarksController@import_marks');