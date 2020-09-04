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

// Reviewed
Route::get('/regulations', 'RegulationController@index');
Route::get('/regulations/{id}', 'RegulationController@get_regulation');
Route::get('/regulations/{id}/semesters', 'RegulationController@get_semesters');
Route::get('/regulations/{id}/specializations', 'RegulationController@get_specializations');
Route::get('/regulations/{regulation_id}/instruction_scheme/{semester_number?}', 'RegulationController@get_instruction_scheme');
Route::get('/departments', 'DepartmentController@index');
Route::get('/departments/{id}', 'DepartmentController@show');




// not yet reviewed
Route::get('/regulations/{regulation_id}/subjects/{subject_code?}', 'RegulationsController@get_subjects');

Route::get('/subjects/{id}/ratings', 'SubjectController@get_ratings');
Route::get('/subjects/{id}/syllabus', 'SubjectController@get_syllabus');
Route::post('/subjects/{id}/ratings', 'SubjectController@add_rating');



Route::get('/students/{key}', 'StudentController@get_students');

Route::get('/academics/classes', 'AcademicsController@get_classes');
Route::post('/academics/classes', 'AcademicsController@store_classes_sections');
Route::get('/academics/exams', 'AcademicsController@get_exams');
Route::post('/academics/exams', 'AcademicsController@store_exams');
Route::get('/academics/instruction_scheme/{semester_id}', 'AcademicsController@get_instruction_scheme');

Route::get('/regulations/{regulation_code}/specializations', 'RegulationsController@specializations');
Route::post('/regulations/{regulation_code}/specializations', 'RegulationsController@storeSpecializations');

Route::post('/contactus/sendemail', 'EmailController@send_contact_us_email');
Route::post('/sendemail', 'EmailController@send_standard_email');

Route::post('/import/marks', 'ImportMarksController@import_marks');