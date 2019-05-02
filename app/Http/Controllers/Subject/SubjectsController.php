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
    public function create(Request $request)
    {
        //Fetch Classes to pass them to dropdown box 

        $selectedclass = $request->has('selectedclass') ? $request->selectedclass: null ; 
        $classes = ClassRoom::all();

        return view('admin.subjects.create', compact('classes' , 'selectedclass'));
    }

    /**
     * Store a newly created Subject in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        //Validate Data 
        $request->validate([
            'name' => 'required|max:200', 
            'class_id' => 'required'
        ]);


        //Prepare Data to persist 
        $attributes['name'] = $request->name ; 
        $attributes['downloable'] = $request->downloable ? true : false ; 

        $attributes['acitve'] = $request->active ? true : false ; 

        $attributes['class_id'] = $request->class_id ;

        //Persist Data in the database 
       $subject =  Subject::create($attributes);

        //Redirect to the Subject Page
        return redirect()
               ->route('subject.show', ['subject' => $subject->id])
               ->with('success','تم  إنشاء المادة الدراسية بنجاح');
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
        //Fetch All Classes 
        $classes = ClassRoom::all();

        return view('admin.subjects.edit', compact('subject', 'classes'));
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
        $request->validate([
            'name' => 'required|max:200',
            'class_id' => 'required|integer'
        ]);


        //Prepare Data
            $subject->name = $request->name ;

            $subject->class_id = $request->class_id ; 

            $subject->active = $request->active ? true : false ; 

            $subject->downloable = $request->downloable ? true : false ; 

        //Persist Data 

        $subject->save();

        //Redirect with Status 
        return redirect()
               ->route('subject.show',['subject' => $subject->id])
               ->with('success', 'تم تعديل المادة الدراسية بنجاح');
    }

    /**
     * Remove the specified Subject from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();


        return redirect()
                ->back()
                ->with('success','تم حذف المادة الدراسية بنجاح');

    }

    /**
     * Activate A Subject
     *  @param \App\Subject $subject
     *  @return \Illuminate\Http\Response 
     */
    public function activate(Subject $subject){

        $subject->activate();

        $subject->save();

        return redirect()
                ->route('subject.show', ['subject' => $subject->id])
                ->with('success','تم تفعبل المادة بنجاح');

    }


    /**
     * Deactivate A Subject 
     * 
     * @param \App\Subject $subject 
     * @return \Illuminate\Http\Response 
     */
    public function deactivate(Subject $subject){

        $subject->deactivate(); 

        $subject->save();
        
        return redirect()
                ->route('subject.show', ['subject'])
                ->with('success','تم إلغاء تفعيل المادة بنجاح');
    }

}
