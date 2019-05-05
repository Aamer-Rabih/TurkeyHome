<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    

    protected $guarded = ['id','created_at','updated_at'];

    

    public function setSrcAttribute($value){

        $this->attributes['src'] = $this->getStoragePath($value);


    }


    public  function getStoragePath($url){

        $segments = explode('/',$url);

        array_shift($segments);

        return implode('/',$segments);
    }
}
