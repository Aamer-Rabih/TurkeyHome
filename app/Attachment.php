<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Attachment extends Model
{
    

    //constants 
    const IMAGE = 'image';
    const PDF = 'pdf';
    const WORD = 'word';


    //guarded Attributes 
    protected $guarded = ['id','created_at','updated_at'];


    //Relationship to Test ot Deneme or Lesson

    /**
     * Attachmentable Models Owener of this Attachment
     */
    public function attachmentable(){

        return $this->morphTo();
    }

    public function setSrcAttribute($value){

        $this->attributes['src'] = $this->getStoragePath($value);


    }


    public function getStoragePath($url){

        $segments = explode('/',$url);

        array_shift($segments);

        return implode('/',$segments);
    }

    public function getSrcAttribute($value){

        return Storage::url($value) ; 
    }
}
