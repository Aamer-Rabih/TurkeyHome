<?php

use Illuminate\Database\Seeder;
use App\Subject ; 

class SubjectsTableSeeder extends Seeder
{

    //helper frunction to return random element

    protected function randomBoolean(){

        $values = [false , true];

        return $values[array_rand($values)];
    }

    protected function fillClass($from = 1, $to =12 , $name){

        
        for($id = $from ; $id <= $to; $id++){

            Subject::create([
                'name' => $name, 
                'active' => $this->randomBoolean(), 
                'downloable' => $this->randomBoolean(), 
                'class_id' => $id
            ]) ;
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::truncate();

        
        //From Class 1 to 9 
        $math = 'الرياضيات';

        $this->fillClass(1,9,$math);

        //From Class 1 to 12 
        $science = 'علم الأحياء';

        $this->fillClass(1 , 12 , $science); 

        //Programming from class 7 to 12 
        $programming = 'البرمجة'; 

        $this->fillClass(7,12 , $programming);


        //Aljebra from class 10 to 12
        $algebra = 'الجبر'; 
        $this->fillClass(10 , 12,$algebra); 

        //Physics from Class 5 to 12 
        $physics = 'الفيزياء' ; 

        $this->fillClass(5 , 12,$physics); 


        }
}

