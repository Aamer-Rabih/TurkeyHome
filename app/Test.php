<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //constants 
    const FIRST_TERM = 1 ; 
    const SECOND_TERM = 2 ; 
    const SUBTEST_1 = 1 ;
    const SUBTEST_2 = 2 ; 


    //guarded attribute 
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];


    //Subjects belonging to this Test 
    public function subjects(){

        return $this->belongsToMany('App\Test','subject_test');
    }

    //Attachments belonging to this Test 
    public function attachments(){

        return $this->morphMany('App\Attachment','attachmentable');
    }
}
