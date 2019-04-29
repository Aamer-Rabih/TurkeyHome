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


Route::get('welcome',function(){

    return view('welcome.blade.php');
});
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
/**
 * Subjects Operations 
 */

//Show All Subjects 
Route::get('subjects','Subject\SubjectsController@index')
->name('subject.index');


//Show The Form to Create A New Subject 

Route::get('subjects/create','Subject\SubjectsController@create')
    ->name('subject.index');


//Show A Single Subject 
Route::get('classes/{class}/subjects/{subject}','Subject\SubjectsController@show')
->name('subject.show');

//Edit A Subject 
Route::get('classes/{class}/subjects/{subject}','Subject\SubjectsController@edit')
->name('subject.edit');

//Store A Subject 
Route::post('subjects','Subject\SubjectsController@store')
->name('subject.store');

//Update A Subject 
Route::patch('classes/{class}/subjects/{subject}','Subject\SubjectsController@update')
->name('subject.update');


//Delete A Subject 

Route::delete('subjects/{subject}','Subject\SubjectsController@destroy')
->name('subject.destroy');


//Activate A Subject

Route::post('subject/{subject}/activate','Subject\SubjectsController@activate');



//Deactivate A Subject 
Route::post('subjects/{subject}/deactivate','Subject\SubjectsController@deactivate');


