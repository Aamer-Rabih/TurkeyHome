<?php

namespace App\Http\Controllers\Unit;

use App\Unit;
use App\ClassRoom;
use App\Subject;
use App\Lesson;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{

    public function __construct()
    {
    
    $this->middleware('auth');
    
    }
    
    /**
     * Display a listing of the Unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch All Units Ordered from last to oldest 
        $units = Unit::latest()->get();


        return view('admin.units.index' , compact('units'));

    }

    /**
     * Show The Form to Choose A Class 
     */
    public function chooseClass(){

        $classes = ClassRoom::all();


        return view('admin.units.chooseClass', compact('classes'));
    }

    /**
     * Show the form for creating a new Unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Fetch All Classes 
        
        $selectedSubject = request()->filled('selectedsubject') ? Subject::findOrFail(request()->selectedsubject) : null ; 
        $subjects = Subject::latest()->get(); 

        //Return View to render All Classes
        return view('admin.units.create', compact('selectedSubject','subjects')); 
    }

    /**
     * Store a newly created Unit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Vaidate Data 
        $request->validate([
            
            'title' => 'required|max:200',
            'subject_id' => 'required'

        ]);


        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        $attributes['active'] = $request->active ? true : false ; 

        $attributes['subject_id'] = $request->subject_id ; 


        //Persist data in the database 
        $unit = Unit::create($attributes);


        //Return redirect 
        return redirect()
            ->route('unit.show', ['unit' => $unit->id])
            ->with('success', 'تم إنشاء الوحدة الدسية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        // $user = Auth::user()->with(['lessons' => function($query){
        //     $query->where()
        // }])->get();

        $lessons = Lesson::with(['teachers' => function($query){
            $query->where('teacher_id', Auth::user()->id);
        }])->get();
        //dd($lessons);
        $unitLessons = Lesson::with(['units'])->get();
        
        //$lessons = array_diff($lessons, $unitLesson);

        
        return view('admin.units.show', compact('unit','lessons','unitLessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $subjects = Subject::latest()->get();    

        return view('admin.units.edit', compact('unit' , 'subjects'));

    }

    /**
     * Update the specified Unit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //Validate data 
        $request->validate([
            'title' => 'required|max:200', 
            'subject_id' => 'required'
        ]);

        //Prepare Data 
        $unit->title = $request->title ; 

        $unit->active = $request->active ? true : false ; 


        $unit->subject_id = $request->subject_id ; 

        //Update The Resource 
        $unit->save();

        //Redirect with status 
        return redirect()
                ->route('unit.show',['unit' => $unit->id])
                ->with('success','تم تعديل الوحدة الدرسية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();


        return redirect()
                ->route('unit.index')
                ->with('success','تم حذف الوحدة الدرسية بنجاح');

    }

    /**
     * Activate The Specified Unit 
     */
    public function activate(Unit $unit){

        $unit->activate();

        $unit->save();

        return back()
                ->with('success','تم تفعيل الوحدة الدرسية بنجاح');
    }


    /**
     * Deactivate The Specified Unit 
     */
    public function deactivate(Unit $unit){

        $unit->deactivate();
        $unit->save();

        return back()
                ->with('success','تم إلغاء تفعيل الوحدة الدرسية بنجاح') ; 
                
    }

    // public function addLesson(Unit $unit)
    // {
    //     $user = Auth::user();

    //     $lessons = $user->lessons();

    
    //     //$lessons = Lesson::with('techers');
        
    //     return view('admin.units.addlesson',compact('unit','lessons'));
    // }

    public function attachLesson(Request $request,Unit $unit)
    {
        $lesson = Lesson::find($request->lesson);
        $unit->lessons()->save($lesson,['lesson_order'=>$unit->lessons()->count()+1]);
        //$order->product()->save($product, ['price' => 12.34]);

        //Redirect with status 
        return redirect()
                ->route('unit.show',['unit' => $unit->id])
                ->with('success','تم تعديل الوحدة الدرسية بنجاح');
    }

    public function deleteLesson(Request $request , Unit $unit)
    {
        $lesson = Lesson::find($request->lesson_id);
        $unit->lessons()->detach($lesson);
        //Redirect with status 
        return redirect()
                ->route('unit.show',['unit' => $unit->id])
                ->with('success','تم تعديل الوحدة الدرسية بنجاح');
    }
}
