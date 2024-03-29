<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);

        $this->call(CarouselsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
