<?php

namespace App\Http\Controllers\ShowLesson;

use App\ShowLesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch All Show Lessons Ordered from last to oldest 
        $showLessons = ShowLesson::latest()->get();


        return view('admin.showlesson.index' , compact('showLessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.showlesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Vaidate Data 
        $request->validate([
            
            'title' => 'required|unique|max:200',
            'order' => 'required',
            'src' => 'required|unique'

        ]);


        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        $attributes['order'] = $request->order ; 

        $attributes['src'] = $request->src ; 


        //Persist data in the database 
        $showLesson = ShowLesson::create($attributes);


        //Return redirect 
        return redirect()
            ->route('showlesson.show', ['showlesson' => $showLesson->id])
            ->with('success', 'تم إنشاء الدرس الاستعراضي بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowLesson  $showLesson
     * @return \Illuminate\Http\Response
     */
    public function show(ShowLesson $showLesson)
    {
        //Return a view with showlesson Model 
        return view('admin.showlesson.show', compact('showLesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowLesson  $showLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowLesson $showLesson)
    {
        //go to the edit view for show lesson
        return view('admin.showlesson.edit',compact('showLesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowLesson  $showLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowLesson $showLesson)
    {
        //Vaidate Data 
        $request->validate([
            
            'title' => 'required|unique|max:200',
            'order' => 'required',
            'src' => 'required|unique'

        ]);


        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        $attributes['order'] = $request->order ; 

        $attributes['src'] = $request->src ; 


        //Persist data in the database 
        $showLesson = ShowLesson::create($attributes);


        //Return redirect 
        return redirect()
            ->route('showlesson.show', ['showlesson' => $showLesson->id])
            ->with('success', 'تم تعديل الدرس الاستعراضي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowLesson  $showLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowLesson $showLesson)
    {
        $showLesson->delete();
        return redirect()->back()
        ->with('success','تم حذف الدرس الاستعراضي بنجاح');
    }
}
