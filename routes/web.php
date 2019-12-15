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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){
//Department
    Route::get('departments','DepartmentController@index');
    Route::get('department/create','DepartmentController@create');
    Route::post('department/save','DepartmentController@save');
    Route::get('department/edit/{id}','DepartmentController@edit');
    Route::post('department/update/{id}','DepartmentController@update');
    Route::post('department/delete/{id}','DepartmentController@delete');

//Classes
    Route::get('classes','ClassesController@index');
    Route::get('class/create','ClassesController@create');
    Route::post('class/save','ClassesController@save');
    Route::get('class/edit/{id}','ClassesController@edit');
    Route::post('class/update/{id}','ClassesController@update');
    Route::post('class/delete/{id}','ClassesController@delete');

//Student
    Route::get('student','StudentController@index');
    Route::get('student/create','StudentController@create');
    Route::post('student/save','StudentController@save');
    Route::get('student/edit/{id}','StudentController@edit');
    Route::post('student/update/{id}','StudentController@update');
    Route::post('student/delete/{id}','StudentController@delete');

    //imageEdit


});


