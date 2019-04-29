<?php

use Illuminate\Database\Seeder;
use App\Course ; 
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::truncate(); 


        $data = [[
            'title' => 'دورة في الإحصاء', 
            'active' => true
        ],
        [
            'title' => 'دورة في التحليل الرياضي' , 
            'active' => true
        ],
        [
            'title' => 'دورة في الجبر', 
            'active' => true
        ],
        [
            'title' => 'دورة في الهندسة التحليلية', 
            'active' => false 
        ],
        [
            'title' => 'دورة في اللغةالتركية', 
            'active' => true
        ],
        [
            'title' => 'دورة في الفيزياء', 
            'active' => true
        ],
        [
            'title' => 'دورة في اللغة الإنكليزية - قواعد', 
            'active' => false 
        ],
    ]; 

    foreach($data as $course){

        course::create($course); 
    }

    }
}
