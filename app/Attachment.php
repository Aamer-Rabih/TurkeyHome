<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
