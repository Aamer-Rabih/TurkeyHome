<?php

namespace App\Http\Controllers\Carousel;

use App\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the Carouels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carouselQuery = (new Carousel())->newQuery();
        //Handle Filtering and sorting paramaters 
        if($request->has('orderby')){

                if ($request->filled('ordertype')){

                    if($request->ordertype == 'asc'){

                       $carouselQuery = $carouselQuery->oldest($request->orderby);
                    }else if($request->ordertype == 'desc'){

                       $carouselQuery =  $carouselQuery->latest($request->orderby);
                    }


                }else {


                   $carouselQuery =  $carouselQuery->latest($request->orderby);
                }
            }
                else {


                  $carouselQuery =   $carouselQuery->latest();
                }


            
            $carousels = $carouselQuery->get();
        //Handle the Json Response 
        if($request->expectsJson()){

            return response()->json(['data' => $carousels],200);
        }

        //Return View to display Carouels
        return view('admin.carousels.index', compact('carousels'));

  
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
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
        //
    }
}
