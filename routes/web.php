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

    return view('welcome');
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
 * Subjects endpoints
 */

//Show All Subjects 
Route::get('subjects','Subject\SubjectsController@index')
->name('subject.index');


//Show The Form to Create A New Subject 
Route::get('subjects/create','Subject\SubjectsController@create')
    ->name('subject.create');

//Show A Single Subject 
Route::get('subjects/{subject}','Subject\SubjectsController@show')
->name('subject.show');


//DELETE A Subject 
Route::delete('subjects/{subject}','Subject\SubjectsController@destroy')
    ->name('subject.destroy');



//Store Subject 
Route::post('subjects','Subject\SubjectsController@store')
->name('subject.store');


//Edit A Subject 
Route::get('subjects/{subject}/edit','Subject\SubjectsController@edit')
->name('subject.edit');


//Update A Subject 
Route::put('subjects/{subject}','Subject\SubjectsController@update')
->name('subject.update');


//Activate A Subject 
Route::post('subjects/{subject}/activate','Subject\SubjectsController@activate')
->name('subject.activate');



//Deactivate A Subject 
Route::post('subjects/{subject}/deactivate','Subject\SubjectsController@deactivate')
->name('subject.deactivate');

/**
 * Units endpoints
 */

 //Index Units 
 //Display All Units 
 Route::get('units','Unit\UnitsController@index')
    ->name('unit.index');


//Delete A Unit 
Route::delete('units/{unit}','Unit\UnitsController@destroy')
    ->name('unit.destroy');



//Show All Classes to choose A Class to create A Unit in it 

Route::get('units/create','Unit\UnitsController@chooseClass');


//Show The Form to create a New Unit 
Route::get('classes/{class}/units/create','Unit\UnitsController@create')
    ->name('unit.create');

//Store The Unit 
Route::post('units','Unit\UnitsController@store')
->name('unit.store');


//Show The Form to edit A Unit 
Route::get('units/{unit}/edit','Unit\UnitsController@edit')
    ->name('unit.edit');

//Update The Unit 
Route::put('units/{unit}','Unit\UnitsController@update')
->name('unit.update');

//Show A Unit 
Route::get('units/{unit}','Unit\UnitsController@show')
    ->name('unit.show');

//Activate A unit 
Route::post('units/{unit}/activate','Unit\UnitsController@activate')
    ->name('unit.activate');

//Deactivate The unit 
Route::post('units/{unit}/deactivate','Unit\UnitsController@deactivate')
->name('unit.deactivate');


/* Carousels Endpoints */ 
Route::get('carousels','Carousel\CarouselsController@index')
->name('carousel.index');

//Show the form to create a new carousel 
Route::get('carousels/create','Carousel\CarouselsController@create')
->name('carousel.create');


//Show The Form to Edit Carousel 
Route::get('carousels/{carousel}/edit','Carousel\CarouselsController@edit')
    ->name('carousel.edit');

//Show Single Carousel 
Route::get('carousels/{carousel}','Carousel\CarouselsController@show')
->name('carousel.show');

//Delete A Carousel 
Route::delete('carousels/{carousel}','Carousel\CarouselsController@destroy')
->name('carousel.destroy');

//Store A Carousel 
Route::post('carousels','Carousel\CarouselsController@store')
->name('carousel.store');

//Update Carousel 
Route::put('carousels/{carousel}','Carousel/CarouselsController@update')
->name('carousel.update');

