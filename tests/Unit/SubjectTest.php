<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubjectTest extends TestCase
{
    use DatabaseMigrations ; 
    
    /** @test */
    public function a_subject_belongs_to_a_class(){

        $class = create('App\ClassRoom');

        //Create New Subject 
        $subject = create('App\Subject');

        $subject->class_id = $class->id ; 

        

        $this->assertInstanceOf('App\ClassRoom',$subject->classroom);
        
    }
}
