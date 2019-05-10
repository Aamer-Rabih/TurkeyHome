<?php

namespace App\Http\Controllers\StudentThank;

use App\StudentThank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentThanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //fetch all thanks 
        $studentThanks = StudentThank::latest()->get();

        return view('admin.studentthanks.index', compact('studentThanks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //go to view create
        return view('admin.studentthanks.create');
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
            'type' => 'required',
            'src' => 'required',
            'text' => 'required',
            'order' => 'required'
        ]);

        //Prepare data to save 

        $attributes['type'] = $request->type ; 

        $attributes['src'] = $request->src ; 

        $attributes['content'] = $request->content ; 

        $attributes['order'] = $request->order ; 


        //Persist data in the database 
        $studentThank = StudentTank::create($attributes);


        //Return redirect 
        return redirect()
            ->route('studentthank.show', ['studentThank' => $studentThank->id])
            ->with('success', 'تم إنشاءالتشكر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentThank  $studentThank
     * @return \Illuminate\Http\Response
     */
    public function show(StudentThank $studentThank)
    {
        return view('admin.studentthanks.show', compact('studentThank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentThank  $studentThank
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentThank $studentThank)
    {
        return view('admin.studentthanks.edit',compact('studentThank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentThank  $studentThank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentThank $studentThank)
    {
        $request->validate([
            'type' => 'required',
            'src' => 'required',
            'content' => 'required',
            'order' => 'required'
        ]);

        //Prepare data to save 

        $studentThank->type = $request->type ; 

        $studentThank->src = $request->src ; 

        $studentThank->content = $request->content ; 

        $studentThank->order = $request->order ; 


        //update student thank in db 
        $studentThank->save();


        //Return redirect 
        return redirect()
            ->route('studentthank.show', ['studentThank' => $studentThank->id])
            ->with('success', 'تم تعديل التشكر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentThank  $studentThank
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentThank $studentThank)
    {
        $studentThank->delete();

        return redirect()
        ->route('studentthank.index')
        ->with('success','تم حذف التشكر بنجاح');
    }
}
