
<?php

use Illuminate\Database\Seeder;

use App\Unit ; 
use App\Subject ; 

class UnitsTableSeeder extends Seeder
{

    //helper frunction to return random element

    protected function randomBoolean(){

        $values = [false , true];

        return $values[array_rand($values)];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Unit::truncate();
        //Seeding Data 
        $units = [
            'الوحدة الأولى', 
            'الوحدة الثانية',
            'الوحدة الثالثة',
            'الوحدة الرابعة',
            'الوحدة الخامسة',
            'الوحدة السادسة',
            'الوحدة السابعة',
            'الوحدة الثامنة'
        ]; 

        //Fetch all subject 
        $subjects = Subject::all();


        //Add to each Subject all units 
        foreach($subjects as $subject){

            foreach($units as $unitTitle){


                $subject->units()->create([
                    'title' => $unitTitle, 
                    'active' => $this->randomBoolean()
                ]);
            }

        }
    }   
}
