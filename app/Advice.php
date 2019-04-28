<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    /**constants */
    const VIDEO = 'video'; 
    const AUDIO = 'audio';

    //Guarded Attributes
    protected $guarded = ['id','created_at','updated_at'];


    /**
     * Fetch the courses owner of this advice
     */
    public function courses(){


        return $this->belongsToMany('App\Course','advice_course');
    }

    /**
     * Fetch the Classes owner of this advice
     */
    public function classes(){


        return $this->belongsToMany('App\ClassRoom','advice_class','advice_id','class_id');
    }
}
