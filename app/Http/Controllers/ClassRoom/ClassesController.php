<?php

namespace App\Http\Controllers\ClassRoom;

use App\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassesController extends Controller
{
    /**
     * Display a listing of the Class.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retrieve All Classes ordered descendant by creating data 
        $classes = ClassRoom::latest()->get();


        //Prepare for Ajax
        if(request()->expectsJson()){

            return $classes ; 
        }

        return view('admin.classes.index')->withClasses($classes)  ; 

        //TODO FrontEn Developer 
        //Load admin.classes.index view with $classes 
    }

    /**
     * Show the form for creating a new Class.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO frontEndDeveloper 
        //load admin.classes.create view


        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data 
        $request->validate([
            'name' => 'required|max:100|unique:classes',
            'free' => 'boolean'
        ]);

        //Store Data 

       $newClass = ClassRoom::create([
            'name' => $request->name,
            'free' => $request->free
        ]); 

        if(request()->wantsJson()){

            return response()->json(['data' => $newClass],201);
        }
        
        //redirect with Session Message 
        return redirect()->route('class.index')->with('success','تم إنشاء الصف بنجاح');
    }

    /**
     * Display the specified ClassRoom.
     *  
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $class)
    {
        
        if(request()->wantsJson()){

            return $class ; 
        }

       
        
        //TODO FrontEnd Developer 
        //Load admin.classes.show view with the $class Model Intance 
        return view('admin.classes.show',compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $class)
    {
       
        //TODO FrontEnd Developer 
        //Load admin.classes.edit view with $class data
        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $class)
    {
        $request->validate([
            'name' => 'required|max:100', 
            'free' => 'boolean'
        ]);

        if($request->has('free')){
            $class->free = $request->free ; 
        }else {
            $class->free = $class->free ; 
        }   

        $class->save();
        

        return redirect()->route('class.index')
            ->with('success','تم تعديل الصف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $class)
    {

        $class->delete();
       
        return redirect()->route('class.index')
                ->with('success','تم حذف الصف بنجاح');
    }

    public function free(ClassRoom $class){
        //Make The Class Free
        $class->free();


        $class->save();

        return redirect()->route('class.show',[
            'class' => $class->id
        ])
        ->with('success','تم تعديل الصف ليكون مجاني');

    }

    public function priced(ClassRoom $class){

        //Make the Class priced
        $class->priced();

        $class->save();

        return redirect()->route('class.show',['class' => $class->id])
        ->with('success','تم تعديل الصف ليكون مدفوع');
    }
}
