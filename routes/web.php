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

Route::get('test', function() {
    return view('front-end.layouts.master');
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
Route::put('carousels/{carousel}','Carousel\CarouselsController@update')
->name('carousel.update');



//Index Show Lesson 
 //Display All show lessons 
 Route::get('showlessons','ShowLesson\ShowLessonsController@index')
    ->name('showlesson.index');

//Show The Form to create a New ShowLesson 
Route::get('showlessons/create','ShowLesson\ShowLessonsController@create')
    ->name('showlesson.create');

    //Show A showlesson 
Route::get('showlessons/{showLesson}','ShowLesson\ShowLessonsController@show')
->name('showlesson.show');

//store show lesson route
Route::post('showlessons','ShowLesson\ShowLessonsController@store')
->name('showlesson.store');

//Show The Form to Edit a ShowLesson 
Route::get('showlessons/{showLesson}/edit','ShowLesson\ShowLessonsController@edit')
    ->name('showlesson.edit');

    //update show lesson route
Route::put('showlessons/{showLesson}','ShowLesson\ShowLessonsController@update')
->name('showlesson.update');

//Delete A ShowLesson 
Route::delete('showlessons/{showLesson}','ShowLesson\ShowLessonsController@destroy')
    ->name('showlesson.destroy');



//display all denemes
    Route::get('denemes','Deneme\DenemesController@index')
    ->name('deneme.index');

    //create view route for deneme
    Route::get('denemes/create','Deneme\DenemesController@create')
    ->name('deneme.create');

    //create view route for deneme
    Route::get('denemes/{deneme}','Deneme\DenemesController@show')
    ->name('deneme.show');

    //store route for deneme
    Route::post('denemes','Deneme\DenemesController@store')
    ->name('deneme.store');

    //Show The Form to Edit a Deneme 
Route::get('denemes/{deneme}/edit','Deneme\DenemesController@edit')
->name('deneme.edit');

//update deneme route
Route::put('denemes/{deneme}','Deneme\DenemesController@update')
->name('deneme.update');

//delete route for deneme
Route::delete('deneme/{deneme}','Deneme\DenemesController@destroy')
->name('deneme.destroy');

//Activate A Deneme 
Route::post('denemes/{course}/activate','Deneme\DenemesController@activate')
    ->name('deneme.activate');

//Deactivate A Deneme 
Route::post('denemes/{deneme}/deactivate','Deneme\DenemesController@deactivate')
    ->name('deneme.deactivate');



//student Thanks index
Route::get('studentthanks','StudentThank\StudentThanksController@index')
->name('studentthank.index');

//student thank create route
Route::get('studentthanks/create','StudentThank\StudentThanksController@create')
->name('studentthank.create');

//student thank show route
Route::get('studentthanks/{studentThank}','StudentThank\StudentThanksController@show')
->name('studentthank.show');

//store student thank route
Route::post('studentthanks','StudentThank\StudentThanksController@store')
->name('studentthank.store');

//Show The Form to Edit a student thank 
Route::get('studentthanks/{studentThank}/edit','StudentThank\StudentThanksController@edit')
    ->name('studentthank.edit');

    //update student thank route
Route::put('studentthanks/{studentThank}','StudentThank\StudentThanksController@update')
->name('studentthank.update');

//Delete A student thank 
Route::delete('studentthanks/{studentThank}','StudentThank\StudentThanksController@destroy')
    ->name('studentthank.destroy');


    //Evaluations index
Route::get('evaluations','Evaluation\EvaluationsController@index')
->name('evaluation.index');

//Evaluation create route
Route::get('evaluations/create','Evaluation\EvaluationsController@create')
->name('evaluation.create');

//Evaluation show route
Route::get('evaluations/{evaluation}','Evaluation\EvaluationsController@show')
->name('evaluation.show');

//store Evaluation route
Route::post('evaluations','Evaluation\EvaluationsController@store')
->name('evaluation.store');

//Show The Form to Edit a Evaluation 
Route::get('evaluations/{evaluation}/edit','Evaluation\EvaluationsController@edit')
    ->name('evaluation.edit');

    //update Evaluation route
Route::put('evaluations/{evaluation}','Evaluation\EvaluationsController@update')
->name('evaluation.update');

//Delete A Evaluation 
Route::delete('evaluations/{evaluation}','Evaluation\EvaluationsController@destroy')
    ->name('evaluation.destroy');

 
 
    //freereasons index
Route::get('freereasons','FreeReason\FreeReasonsController@index')
->name('freereason.index');

//freereason create route
Route::get('freereasons/create','FreeReason\FreeReasonsController@create')
->name('freereason.create');

//freereason show route
Route::get('freereasons/{freeReason}','FreeReason\FreeReasonsController@show')
->name('freereason.show');

//store freereason route
Route::post('freereasons','FreeReason\FreeReasonsController@store')
->name('freereason.store');

//Show The Form to Edit a freereason
Route::get('freereasons/{freeReason}/edit','FreeReason\FreeReasonsController@edit')
    ->name('freereason.edit');

    //update freereason route
Route::put('freereasons/{freeReason}','FreeReason\FreeReasonsController@update')
->name('freereason.update');

//Delete A FreeReason 
Route::delete('freereasons/{freeReason}','FreeReason\FreeReasonsController@destroy')
    ->name('freereason.destroy');


    //Tests index
Route::get('tests','Test\TestController@index')
->name('test.index');

//Test create route
Route::get('tests/create','Test\TestController@create')
->name('test.create');

//Test show route
Route::get('tests/{test}','Test\TestController@show')
->name('test.show');

//store Test route
Route::post('tests','Test\TestController@store')
->name('test.store');

//Show The Form to Edit a Test
Route::get('tests/{test}/edit','Test\TestController@edit')
    ->name('test.edit');

    //update Test route
Route::put('tests/{test}','Test\TestController@update')
->name('test.update');

//Delete A Test 
Route::delete('tests/{test}','Test\TestController@destroy')
    ->name('test.destroy');



//Comments index
Route::get('comments','Comment\CommentsController@index')
->name('comment.index');

//Comment create route
Route::get('comments/create','Comment\CommentsController@create')
->name('comment.create');

//Comment show route
Route::get('comments/{comment}','Comment\CommentsController@show')
->name('comment.show');

//store Comment route
Route::post('comments','Comment\CommentsController@store')
->name('comment.store');

//Show The Form to Edit a Comment
Route::get('comments/{comment}/edit','Comment\CommentsController@edit')
    ->name('comment.edit');

    //update Comment route
Route::put('comments/{comment}','Comment\CommentsController@update')
->name('comment.update');

//Delete A Comment 
Route::delete('comments/{comment}','Comment\CommentsController@destroy')
    ->name('comment.destroy');


    //replies index
Route::get('replies','Reply\RepliesController@index')
->name('reply.index');

//Reply create route
Route::get('replies/create','Reply\RepliesController@create')
->name('reply.create');

//Reply show route
Route::get('replies/{reply}','Reply\RepliesController@show')
->name('reply.show');

//store Reply route
Route::post('replies','Reply\repliesController@store')
->name('reply.store');

//Show The Form to Edit a Reply
Route::get('replies/{reply}/edit','Reply\RepliesController@edit')
    ->name('reply.edit');

    //update Reply route
Route::put('replies/{reply}','Reply\RepliesController@update')
->name('reply.update');

//Delete A Reply 
Route::delete('replies/{reply}','Reply\RepliesController@destroy')
    ->name('reply.destroy');


       //attachments index
Route::get('attachments','Attachment\AttachmentsController@index')
->name('attachment.index');

//attachment create route
Route::get('attachments/create','Attachment\AttachmentsController@create')
->name('attachment.create');

//attachment show route
Route::get('attachments/{attachment}','Attachment\AttachmentsController@show')
->name('attachment.show');

//store attachment route
Route::post('attachments','Attachment\AttachmentsController@store')
->name('attachment.store');

//Show The Form to Edit a attachment
Route::get('attachments/{attachment}/edit','Attachment\AttachmentsController@edit')
    ->name('attachment.edit');

    //update attachment route
Route::put('attachments/{attachment}','Attachment\AttachmentsController@update')
->name('attachment.update');

//Delete A attachment 
Route::delete('attachments/{attachment}','Attachment\AttachmentsController@destroy')
    ->name('attachment.destroy');


     //advices index
Route::get('advices','Advice\AdvicesController@index')
->name('advice.index');

//advice create route
Route::get('advices/create','Advice\AdvicesController@create')
->name('advice.create');

//advice show route
Route::get('advices/{advice}','Advice\AdvicesController@show')
->name('advice.show');

//store advice route
Route::post('advices','Advice\AdvicesController@store')
->name('advice.store');

//Show The Form to Edit an advice
Route::get('advices/{advice}/edit','Advice\AdvicesController@edit')
    ->name('advice.edit');

    //update advice route
Route::put('advices/{advice}','Advice\AdvicesController@update')
->name('advice.update');

//Delete An advice 
Route::delete('advices/{advice}','Advice\AdvicesController@destroy')
    ->name('advice.destroy');



        //lessons index
Route::get('lessons','Lesson\LessonsController@index')
->name('lesson.index');

//lesson create route
Route::get('lessons/create','Lesson\LessonsController@create')
->name('lesson.create');

//lesson show route
Route::get('lessons/{lesson}','Lesson\LessonsController@show')
->name('lesson.show');

//store lesson route
Route::post('lessons','Lesson\LessonsController@store')
->name('lesson.store');

//Show The Form to Edit an lesson
Route::get('lessons/{lesson}/edit','Lesson\LessonsController@edit')
    ->name('lesson.edit');

    //update lesson route
Route::put('lessons/{lesson}','Lesson\LessonsController@update')
->name('lesson.update');

//Delete An lesson 
Route::delete('lessons/{lesson}','Lesson\LessonsController@destroy')
    ->name('lesson.destroy');




