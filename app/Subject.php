<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //Mass Assignment Exception 
    protected $fillable = ['name','downloable','units_nums','class_id'];

  

    //A Subject belongs to one Class 
    public function classroom(){

        return $this->belongsTo('App\ClassRoom','class_id');
    }

    //A Subject has many units 
    public function units(){

        return $this->hasMany('App\Unit');
    }



}
