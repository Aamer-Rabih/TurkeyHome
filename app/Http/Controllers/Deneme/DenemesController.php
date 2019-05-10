<?php

namespace App\Http\Controllers\Deneme;

use App\Deneme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DenemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $denemes = Deneme::latest()->get();
        return view('admin.denemes.index', compact('denemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.denemes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //validate data
        $request->validate([
          'title' => 'required|max:200',
          'term' => 'required',
          'active' => 'requried',
          'type' => 'requried',
          'class_id' => 'requried',
        ]);

        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        $attributes['active'] = $request->active ? true : false ; 

        $attributes['term'] = $request->term ;

        $attributes['type'] = $request->type ;

        $attributes['src'] = $request->src ;

        $attributes['class_id'] = $request->class_id ;


        //Persist data in the database 
        $deneme = Deneme::create($attributes);


        //Return redirect 
        return redirect()
            ->route('deneme.show', ['deneme' => $deneme->id])
            ->with('success', 'تم إنشاءالدينمي بنجاح');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deneme  $deneme
     * @return \Illuminate\Http\Response
     */
    public function show(Deneme $deneme)
    {
        return view('admin.denemes.show', compact('deneme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deneme  $deneme
     * @return \Illuminate\Http\Response
     */
    public function edit(Deneme $deneme)
    {
        return view('admin.denemes.edit',compact('deneme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deneme  $deneme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deneme $deneme)
    {

        //validate data
        $request->validate([
            'title' => 'required|max:200',
            'term' => 'required',
            'active' => 'requried',
            'type' => 'requried',
            'class_id' => 'requried',
          ]);

        //Prepare data to save 

        $deneme->title = $request->type ; 

        $deneme->term = $request->src ; 

        $deneme->active = $request->content ; 

        $deneme->order = $request->order ; 


        //update student thank in db 
        $deneme->save();


        //Return redirect 
        return redirect()
            ->route('studentthank.show', ['studentThank' => $studentThank->id])
            ->with('success', 'تم تعديل التشكر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deneme  $deneme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deneme $deneme)
    {
        //
    }
}
