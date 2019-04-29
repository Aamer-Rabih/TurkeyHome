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


//Show Active Courses Only 
//TODO display courses depending on the Role of the user 

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


/**Courses Endpoints */

//Show All Courses
Route::get('courses','Course\CoursesController@index')
    ->name('course.index');

//Create A Form to store new Course 
Route::get('courses/create','Course\CoursesController@create')
    ->name('course.create');

//Post Course 
Route::post('courses','Course\CoursesController@store')
    ->name('course.store');

//Show A Single Course 
Route::get('courses/{course}','Course\CoursesController@show')
    ->name('course.show');

//Delete A Course 
Route::delete('courses/{course}','Course\CoursesController@destroy')
    ->name('course.destroy');

//Edit A Course
Route::get('courses/{course}/edit','Course\CoursesController@edit')
    ->name('course.edit');


//Update A Course 
Route::patch('courses/{course}','Course\CoursesController@update')
    ->name('course.update');


//Activate A Course 
Route::post('courses/{course}/activate','Course\CoursesController@activate')
    ->name('course.activate');

//Deactivate A Course 
Route::post('courses/{course}/deactivate','Course\CoursesController@deactivate')
    ->name('course.deactivate');
