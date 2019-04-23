<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $fillable = ['title','active','subject_id'];

    //A Unit belongs to A Subject
    public function subject(){

        return $this->belongsTo('App\Subject');
    }
}
