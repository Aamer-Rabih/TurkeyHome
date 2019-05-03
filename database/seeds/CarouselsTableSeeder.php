<?php

use Illuminate\Database\Seeder;
use App\Carousel ; 

class CarouselsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::truncate(); 


        $data = [

            [

                'src' => Storage::url('carousels/1.jpg'), 
                'order' => 1
            ],
            [

                'src' => Storage::url('carousels/2.jpg'), 
                'order' => 2
            ],
            [

                'src' => Storage::url('carousels/3.jpg'), 
                'order' => 3
            ]

            ];


            foreach($data as $item){

                Carousel::create($item); 
            }
    }
}
