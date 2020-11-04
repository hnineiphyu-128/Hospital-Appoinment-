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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Frontend 
Route::get('/', 'FrontendController@index')->name('index');
Route::get('/speciality_page/{id}', 'FrontendController@speciality_page')->name('speciality_page');
Route::get('/appoinment_doctor/{id}', 'FrontendController@appoinment_doctor')->name('appoinment_doctor');
Route::get('/appoinment_success', 'FrontendController@appoinment_success')->name('appoinment_success');

Route::post('/patient_info', 'FrontendController@patient_info')->name('patient_info');
Route::get('/patient_page', 'FrontendController@patient_page')->name('patient_page');
Route::get('/user_profile', 'FrontendController@user_profile')->name('user_profile');
Route::post('/user_edit','FrontendController@user_edit')->name('user_edit');

//Backend

//Admin
Route::group(['middleware' => 'role:admin' ,'prefix' => 'admin','as' => 'admin.'],function(){

Route::get('/dashboard', 'BackendController@index')->name('dashboard');
Route::resource('/speciality','SpecialityController');
Route::resource('/doctor','DoctorController');
Route::resource('/schedule','ScheduleController');
Route::resource('/patient','PatientController');
Route::resource('/user','UserController');

});

//Doctor
Route::group(['middleware' => 'role:doctor' ,'prefix' => 'doctor','as' => 'doctor.'],function(){

Route::get('/doctor_page', 'BackendController@doctor_page')->name('doctor_page');
Route::get('/doctor_profile','BackendController@doctor_profile')->name('doctor_profile');
Route::get('/doctor_patient','BackendController@doctor_patient')->name('doctor_patient');
Route::get('/doctor_schedule','BackendController@doctor_schedule')->name('doctor_schedule');
Route::post('/doctor_edit','BackendController@doctor_edit')->name('doctor_edit');

});

