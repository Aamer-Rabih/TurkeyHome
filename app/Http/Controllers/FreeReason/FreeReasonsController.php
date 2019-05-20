<?php

namespace App\Http\Controllers\FreeReason;

use App\FreeReason;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FreeReasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freeReasons = FreeReason::latest()->get();
        return view('admin.freereasons.index',compact('freeReasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.freereasons.create');
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
          'text' => 'required',
          
        ]);

        $freeReason = new FreeReason();
        $freeReason->text = $request->text;
        $freeReason->save();

        //Return redirect 
        return redirect()
            ->route('freereason.show', ['freeReason' => $freeReason->id])
            ->with('success', 'تم إنشاء سبب الاعفاء بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\FreeReason  $freeReason
     * @return \Illuminate\Http\Response
     */
    public function show(FreeReason  $freeReason)
    {
        return view('admin.freereasons.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\FreeReason  $freeReason
     * @return \Illuminate\Http\Response
     */
    public function edit(FreeReason  $freeReason)
    {
        return view('admin.freereasons.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\FreeReason  $freeReason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FreeReason  $freeReason)
    {
        $request->validate([
            'text' => 'required',
            
          ]);
  
          $freeReason = new FreeReason();
          $freeReason->text = $request->text;
          $freeReason->save();

          //Return redirect 
        return redirect()
        ->route('freereason.show', ['freeReason' => $freeReason->id])
        ->with('success', 'تم تعديل سبب الاعفاء بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\FreeReason  $freeReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreeReason  $freeReason)
    {
        $freeReason->delete();
        return redirect()->back()
        ->with('success','تم حذف سبب الاعفاء بنجاح');
    }
}
