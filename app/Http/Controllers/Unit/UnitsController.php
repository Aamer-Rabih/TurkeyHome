<?php

namespace App\Http\Controllers\Unit;

use App\Unit;
use App\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitsController extends Controller
{
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
    public function create(ClassRoom $class)
    {
        //Fetch All Classes 
        

        //Return View to render All Classes
        return view('admin.units.create', compact('class')); 
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
        

        return view('admin.units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $classes = ClassRoom::all();    

        return view('admin.units.edit', compact('unit' , 'classes'));

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

        return redirect()
                ->route('unit.show', ['unit' => $unit->id])
                ->with('success','تم تفعيل الوحدة الدرسية بنجاح');
    }


    /**
     * Deactivate The Specified Unit 
     */
    public function deactivate(Unit $unit){

        $unit->deactivate();
        $unit->save();

        return redirect()
                ->route('unit.show', ['unit' => $unit->id])
                ->with('success','تم إلغاء تفعيل الوحدة الدرسية بنجاح') ; 
                
    }
}
