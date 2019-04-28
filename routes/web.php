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

/**
 * Class Operatrions
 */
//Show All Classes
Route::get('classes','ClassRoom\ClassesController@index')
->name('class.index');

//Show The Form to Create New Class 
Route::get('classes/create','ClassRoom\ClassesController@create')
->name('class.create');

//Show One Class 
Route::get('classes/{class}','ClassRoom\ClassesController@show')
->name('class.show');


//Store the new Class in the database 
Route::post('classes','ClassRoom\ClassesController@store')
->name('class.store');

//Show the Form to edit a class
Route::get('classes/{class}/edit','ClassRoom\ClassesController@edit')
->name('class.edit');


//Update A Class 
Route::patch('classes/{class}/','ClassRoom\ClassesController@update')
->name('class.update');

//Delete A Class 
Route::delete('classes/{class}','ClassRoom\ClassesController@destroy')
->name('class.destroy');

//endpoint to Make The Class Free
Route::post('classes/{class}/setFree','ClassRoom\ClassesController@free')
->name('class.free');


//endpoint to make the class priced 
Route::post('classes/{class}/setPriced','ClassRoom\ClassesController@priced')
->name('class.priced');