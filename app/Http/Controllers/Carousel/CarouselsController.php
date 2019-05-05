<?php

namespace App\Http\Controllers\Carousel;

use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage ; 

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        



        $carousels = Carousel::latest()->get(); 

        return view('admin.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = $this->getAllOrders() ; 

        return view('admin.carousels.create',compact('orders')); 
        
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
            'src' => 'required',
            'order' => 'required|integer'
        ]);
            

        $attributes = [];
        //save Image 
            if($request->hasFile('src')){

                    $attributes['src'] = $request->src->store('public/carousels');

            }


        //Save Order 


     

         $this->shiftOrdersAfterStore($request->order);

      

        $attributes['order'] = $request->order ; 

       

        Carousel::create($attributes);
        
        return redirect()
                ->route('carousel.index')
                ->with('success','تم إنشاء عنصر قلاب جديد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        
        return view('admin.carousels.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        
        $orders = $this->getCurrentOrders() ; 


        return view('admin.carousels.edit' , compact('carousel','orders')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        
        $oldOrder = $carousel->order ; 

        //Delete The carousel image 
        Storage::delete('/public/' . $carousel->src);


        //Delete The table 
        $carousel->delete();

        $this->shiftOrdersAfterDelete($oldOrder);


        return redirect()
                ->back()
                ->with('success','تم حذف عنصر القلاب بنجاح');



        
    }

    //Get new order 
    public function getNewOrder(){


        return Carousel::max('order') + 1 ; 
    }


    //Get All Orders 
    public function getAllOrders(){


        $oldOrders = Carousel::pluck('order')->toArray(); 


        $lastOrder = Carousel::max('order') + 1 ; 

        return array_merge($oldOrders, [$lastOrder]); 
    }


    public function getCurrentOrders(){

        
        return Carousel::pluck('order')->toArray() ; 
    }

    public function shiftOrdersAfterStore($order){

        //Fetch All carousels after sepcifed order 
        $carousels = Carousel::where('order','>=',$order)->get(); 

        


        foreach($carousels as $carousel){

            $oldOrder= $carousel->order ; 

            $carousel->order  = $oldOrder + 1 ;  
            $carousel->save();
        }
    }

    public function shiftOrdersAfterDelete($order){

        //Fetch All carousels after sepcifed order 
        $carousels = Carousel::where('order','>',$order)->get(); 

        


        foreach($carousels as $carousel){

            $oldOrder= $carousel->order ; 

            $carousel->order  = $oldOrder - 1 ;  
            $carousel->save();
        }

    }
}
