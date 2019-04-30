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
            $subjectsQuery = Subject::latest(); 

            if(request()->has('take')){

                $subjectsQuery->take(request('take')); 
            }

            $subjects = $subjectsQuery->get();

            

        return view('admin.subjects.index', compact('subjects')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Fetch All Classes From the database and pass them to the form 
        //of creation a subject 
        $classes = ClassRoom::all();


        return view('admin.subjects.index', compact('classes')); 


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate Data 
        $request->validate([

            'name' => 'required|max:200', 
            'downloable' => 'boolean' , 
            'active' => 'boolean'
        ]);

        //Prepare Data to store 
        $attributes['name'] = $request->name ; 

        $attributes['downloable'] = $request->downloable ? true : false ; 

        $attributes['active'] = $request->active ? true : false ; 

        $class_id = $request->class_id ;
        
        //Fetch the selected class 
        $class = ClassRoom::find($class_id); 

        //Persist Data to the database 
        $subject = $class->add($attributes);

        //Return redirect with Flash Message 

        return redirect()
            ->route('subject.show',['subject' => $subject->id])
            ->with('success','تم إنشاء المادة الدراسية بنجاح');
    }

    /**
     * Display the specified Subject.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $class,Subject $subject)
    {

        return view('admin.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $class,Subject $subject)
    {
        
        //Pass Subjects to The Form 
        $classes = ClassRoom::all(); 

        return view('admin.subjects.edit' , compact('subject','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ClassRoom $class, Subject $subject)
    {
        //validate Data 
        $request->validate([
            'name' => 'required|max:200', 
            'class_id' => 'required|integer',
            'downloable' => 'boolean', 
            'active' => 'boolean'
        ]);

        //Prepare Data 
            $subject->name = $request->name ; 
            $subject->class_id = $request->class_id ; 
            

            $subject->downloable = $request->downloable ? true : false ; 
            $subject->active = $request->active ? true : false ; 

        //Update Data 
        
        $subject->save();


        //return redirect Response with Session Message
        return redirect()->route('subject.show',['subject' => $subject->id]); 
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

        return redirect()->route('subject.index',['subject' => $subject->id])
        ->with('success','تم حذف المادة الدراسية بنجاح'); 

        
    }


    //Action to activate A Subject 
    public function activate(Subject $subject){

        $subject->activate();
        $subject->save();


        return redirect()->route('subject.show', ['subject' => $subject->id  ])
        ->with('success', 'تم تفعيل المادة الدراسية بنجاح'); 

    }


    //Action to deactivate A Subject 
    public function deactivate(Subject $subject){
        $subject->deactivate();

        $subject->save();


        return redirect()->route('subject.show',['class' => $subject->class->id])
        ->with('success','تم إلغاء تفعيل المادة الدراسية بنجاح') ;

    }
}
