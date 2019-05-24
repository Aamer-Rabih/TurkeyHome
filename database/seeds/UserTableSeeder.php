<?php
use App\Manager;
use App\Teacher;
use App\Student;
use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        //DEFINE ROLES TO ASSIGN THEM TO USERS
        $role_manager = Role::where('role',Role::MANAGER)->first();
        $role_teacher = Role::where('role',Role::TEACHER)->first();
        $role_student = Role::where('role',Role::STUDENT)->first();
        
        //DEFINE USERS
        $manager = new User();
        $manager->username = 'manager';
        $manager->password = bcrypt('123456789');
        $manager->full_name = 'manager_nd';
        $manager->email = 'manager@manager.com';
        $manager->phone = '665544551';
        $manager->tc = 'manager';
        $manager->save();
        $manager->roles()->attach($role_manager);


        $teacher = new User();
        $teacher->username = 'teacher';
        $teacher->password = bcrypt('123456789');
        $teacher->full_name = 'teacher_nd';
        $teacher->email = 'teacher@teacher.com';
        $teacher->phone = '665544552';
        $teacher->tc = 'teacher';
        $teacher->save();
        $teacher->roles()->attach($role_teacher);


        $student = new User();
        $student->username = 'student';
        $student->password = bcrypt('123456789');
        $student->full_name = 'student_nd';
        $student->email = 'student@student.com';
        $student->phone = '665544553';
        $student->tc = 'student';
        $student->save();
        $student->roles()->attach($role_student);
        

    }
}
