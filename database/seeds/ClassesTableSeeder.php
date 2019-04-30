<?php

use Illuminate\Database\Seeder;
use App\ClassRoom ; 

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassRoom::truncate();


        $data = [

            [
                'name' => 'الصف الأول', 
                'free' => false
            ],
            [
                'name' => 'الصف الثاني', 
                'free' => true
            ],
            [
                'name' => 'الصف الثالث', 
                'free' => true
            ],
            [
                'name' => 'الصف الرابع', 
                'free' => true
            ],
            [
                'name' => 'الصف الخامس', 
                'free' => true
            ],
            [
                'name' => 'الصف السادس', 
                'free' => false
            ],
            [
                'name' => 'الصف السابع', 
                'free' => false 
            ],
            [
                'name' => 'الصف الثامن', 
                'free' => true
            ],
            [
                'name' => 'الصف التاسع', 
                'free' => false
            ],
            [
                'name' => 'الصف العاشر', 
                'free' => false 
            ],
            [
                'name' => 'الصف الحادي عشر', 
                'free' => true
            ],
            [
                'name' => 'الصف الثاني عشر', 
                'free' => false
            ]
        ];


            foreach($data as $class){

                ClassRoom::create($class);
                
            }
    }
}
