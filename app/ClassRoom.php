<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    
    protected $fillable = ['name','free'];

    protected $table = 'classes';

    
    public function subjects(){

        return $this->hasMany('App\Subject','class_id');
    }
}
