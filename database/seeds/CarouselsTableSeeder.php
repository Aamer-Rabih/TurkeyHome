><?php

use Illuminate\Database\Seeder;
use  App\Carousel ; 


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
                'src' => 'public/carousels/1.jpg',
                'order' => 1
            ],
            [
                'src' => 'public/carousels/2.jpg',
                'order' => 2
            ],
            [
                'src' => 'public/carousels/3.jpg',
                'order' => 3
            ]
            ]; 

            foreach($data as $carousel){

                Carousel::create($carousel); 

            }
    }
}
