<?php

namespace App\Http\Controllers\Advice;

use App\Advice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage ; 
use File;
use Validator ; 

class AdvicesController extends Controller
{
    public function __construct()
    {
    
    $this->middleware('auth');
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advices = Advice::latest()->get();
        return View('admin.advices.index',compact('advices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
/*
        $v->sometimes('reason', 'required|max:500', function ($input) {
            return $input->games >= 100;
        });*/
        //Vaidate Data 

        //'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime'

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => 'required'
        ]);

      

        if ($validator->fails()) {
            return redirect()
                        ->route('advice.create')
                        ->withErrors($validator)
                        ->withInput();
        }

       
        /*$request->validate([
            
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => 'required'

        ]);*/

       


        //Prepare data to save 

        $attributes['title'] = $request->title ; 
        $attributes['type'] = $request->type ;
        $attributes['active'] = $request->active ? true : false ;
        //save File 
        if($request->hasFile('src')){

            $attributes['src'] = $request->src->store('public/advices');

        }

         //Persist data in the database 
         $advice = Advice::create($attributes);

         //Return redirect 
        return redirect()
        ->route('advice.show', ['advice' => $advice->id])
        ->with('success', 'تم إنشاء النصيحة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  App\Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        return view('admin.advices.show',compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function edit(Advice $advice)
    {
        return view('admin.advices.edit',compact('advice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advice $advice)
    {
        $request->validate([
            
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => ''

        ]);

        $advice->title = $request->title ;
        $advice->type = $request->type ;  
        $advice->active = $request->active ? true : false ;  

        if($request->hasFile('src')) {
            Storage::delete($advice->src);
            $advice->src = $request->src->store('public/advices');
        }

        $advice->save();

        //Return redirect 
        return redirect()
            ->route('advice.show', ['advice' => $advice->id])
            ->with('success', 'تم تعديل النصيحة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Advice $advice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $advice)
    {
         //Delete The advice file
         Storage::delete($advice->src);

         //Delete advice from db
         $advice->delete();

         return redirect()->back()
        ->with('success','تم حذف النصيحة بنجاح');
    }
}
