<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $role_manager = new Role();
        $role_manager->role = Role::MANAGER;
        $role_manager->save();

        $role_teacher = new Role();
        $role_teacher->role = Role::TEACHER;
        $role_teacher->save();

        $role_student = new Role();
        $role_student->role = Role::STUDENT;
        $role_student->save();

        /*$role_admin = new Role();
        $role_admin->role = Role::ADMIN;
        $role_admin->save();*/
    }
}
