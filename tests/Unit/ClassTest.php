<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassTest extends TestCase
{
    use DatabaseMigrations; 


    /** @test */
    public function a_class_has_subjects(){

        //Create A Class 

        $classRoom = create('App\ClassRoom');

        //The subjects should be Eloquent Collection

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$classRoom->subjects);
    }
    
}
