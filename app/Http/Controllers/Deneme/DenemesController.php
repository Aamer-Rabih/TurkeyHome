<?php

namespace App\Http\Controllers\Deneme;

use App\ClassRoom;
use App\Deneme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage ; 
use File;

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
        $classes = ClassRoom::all();

        return view('admin.denemes.create',compact('classes'));
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
          'term' => 'required|integer',
          'active' =>'required',
          'type' => 'required',
          'src' => 'required'
        ]);

        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        $attributes['active'] =  $request->active ? true : false ; 

        $attributes['term'] = $request->term ;

        $attributes['type'] = $request->type ;


        if($request->hasFile('src')){

            $attributes['src'] = $request->src->store('public/denemes');

        }
        

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
        return view('admin.denemes.edit', compact('deneme'));
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
            'term' => 'required|integer',
            'active' => 'required',
            'type' => 'required',
            'class_id' => 'required',
            'src' => 'required'
          ]);

        //Prepare data to save 

        $deneme->title = $request->title ; 

        $deneme->term = $request->term ; 

        $deneme->active = $request->active ? true : false ; 

        $deneme->type = $request->type ; 

        //save new File 
        if($request->hasFile('src')) {
            //delete old file
            Storage::delete($deneme->src);
            
            $deneme->src = $request->src->store('public/denemes');
        }


        //update deneme in db 
        $deneme->save();


        //Return redirect 
        return redirect()
            ->route('deneme.show', ['deneme' => $deneme->id])
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
        //Delete The deneme file
        Storage::delete($deneme->src);

        //Delete deneme from db
        $deneme->delete();
        return redirect()->back()
        ->with('success','تم حذف الدينيمي بنجاح');
    }

    /**
     * Action to Activate A Course 
     */
    public function activate(Deneme $deneme){

        $deneme->active = true;
        
        $deneme->save();
        
        return redirect()->route('deneme.show', ['deneme' => $deneme->id])
                ->with('success','تم تفعيل الدينيمي بنجاح');
    }

     /**
      * Action to deactivate A Deneme
      */
      public function deactivate(Deneme $deneme){
        $deneme->active = false;
        $deneme->save();

        return redirect()->route('deneme.show', ['deneme' => $deneme->id])
                ->with('success', 'تم إلغاء تفعيل الدينيمي بنجاح');

      }
}
