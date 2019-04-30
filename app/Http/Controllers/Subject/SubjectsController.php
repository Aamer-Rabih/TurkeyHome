<?php

namespace App\Http\Controllers\Subject;

use App\Subject;
use App\ClassRoom ; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Fetch all the subjects from teh database 
        $subjectsQuery = Subject::latest(); 

        //handle parameter limit 
        if(request()->has('take')){

            $subjectsQuery->take(request()->take) ; 
        }

        $subjects = $subjectsQuery->get(); 

        //return view with subjects passed 

        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Fetch Classes to pass them to dropdown box 

        $classes = ClassRoom::all();

        return view('admin.subjects.create', compact('classes'));
    }

    /**
     * Store a newly created Subject in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        dd($request->class_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        

        //Return a view with Subejct Model 
        return view('admin.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();


        return redirect()->route('subject.index')
                ->with('success','تم حذف المادة الدراسية بنجاح');

    }
}
