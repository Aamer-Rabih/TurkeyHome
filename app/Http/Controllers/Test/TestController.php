<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use Storage ; 
use File;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::latest()->get();
        return view('admin.tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Vaidate Data 
        $request->validate([
            
            'title' => 'required|max:200',
            'term' => 'required|integer',
            'sub_test' => 'required|integer',
            'active' => 'required',
            'type' => 'required',
            'src' => ''

        ]);


        //Prepare data to save 

        $attributes['title'] = $request->title ; 

        
        $attributes['term'] = $request->term ; 

        //save File 
        if($request->hasFile('src')){

            $attributes['src'] = $request->src->store('public/tests');

        }

        $attributes['active'] = $request->active ? true : false ; 

        $attributes['type'] = $request->type ; 

        $attributes['sub_test'] = $request->sub_test ; 

        //Persist data in the database 
        $test = Test::create($attributes);


        //Return redirect 
        return redirect()
            ->route('test.show', ['test' => $test->id])
            ->with('success', 'تم إنشاء الاختبار بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('admin.tests.show',compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('admin.tests.edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
         //Vaidate Data 
         $request->validate([
            
            'title' => 'required|max:200',
            'term' => 'required|integer',
            'sub_test' => 'required|integer',
            'active' => 'required',
            'type' => 'required',
            'src' => ''

        ]);

        $test->title = $request->title ;
        $test->term = $request->term;
        $test->sub_test =$request->sub_test;
        $test->active =$request->active ? true : false ; 
        $test->type = $request->type;

        //$test->order = $request->order ; 

        if($request->hasFile('src')) {
            Storage::delete($test->src);
            $test->src = $request->src->store('public/tests');
        }
        //save changes
        $test->save();

         //Return redirect 
         return redirect()
         ->route('test.show', ['test' => $test->id])
         ->with('success', 'تم تعديل الاختبار بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
         //Delete The test file
         Storage::delete($test->src);

         //Delete test from db
         $test->delete();
         
 
         return redirect()->back()
         ->with('success','تم حذف الاختبار بنجاح');
    }
}
