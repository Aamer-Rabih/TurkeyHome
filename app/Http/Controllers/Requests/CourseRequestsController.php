<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RequestCourse;
use Auth;
use App\Course;

class CourseRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestCourse::all();

        return view('admin.requestcourse.index',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestCourse = new RequestCourse();
        $requestCourse->student_id = Auth::user()->id;
        $requestCourse->course_id = $request->course_id;
        $requestCourse->save();
        return redirect()->back()->with('success','تم ارسال الطلب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestCourse= RequestCourse::where('id',$id)->first();
        //dd($requestCourse);
        $course = Course::where('id',$requestCourse->course_id)->first();
        //dd($requestCourse->student_id);
        $course->students()->syncWithoutDetaching($requestCourse->student_id);
        
       //Delete lesson from db
       $requestCourse->delete();

       return redirect()->back()
      ->with('success','تم قبول الطلب بنجاح');
    }
}
