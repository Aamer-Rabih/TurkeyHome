<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::latest()->get();
        return view('admin.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => 'required',
            'intro' => 'required'
        ]);

        
        //Prepare data to save 

        $attributes['title'] = $request->title ; 
        $attributes['type'] = $request->type ;
        $attributes['active'] = $request->active ? true : false ;
        $attributes['intro'] = $request->intro ;

        //save File 
        if($request->hasFile('src')){

            $attributes['src'] = $request->src->store('public/lessons');

        }

         //Persist data in the database 
         $lesson = Lesson::create($attributes);

         //Return redirect 
        return redirect()
        ->route('lesson.show', ['lesson' => $lesson->id])
        ->with('success', 'تم إنشاء الدرس بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.edit',compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => '',
            'intro' => 'required'
        ]);

        $lesson->title = $request->title ;
        $lesson->type = $request->type ;
        $lesson->intro =$request->intro;  
        $lesson->active = $request->active ? true : false ;  

        if($request->hasFile('src')) {
            Storage::delete($lesson->src);
            $lesson->src = $request->src->store('public/lessons');
        }

        $lesson->save();

        //Return redirect 
        return redirect()
            ->route('lesson.show', ['lesson' => $lesson->id])
            ->with('success', 'تم تعديل الدرس بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //Delete The lesson file
        Storage::delete($lesson->src);

        //Delete lesson from db
        $lesson->delete();

        return redirect()->back()
       ->with('success','تم حذف الدرس بنجاح');
    }
}
