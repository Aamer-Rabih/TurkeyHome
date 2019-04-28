<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deneme extends Model
{
    

    //constants 
    const VIDEO = 'video';
    const IMAGE = 'image';
    const PDF = 'pdf';
    const WORD = 'word';
    const LINK = 'link';

    //guarded attributes 
    protected $guarded = ['id','created_at','updated_at'];


    /**
     * Class Owner of this Deneme
     */
    public function class(){

        return $this->belongsTo('App\ClassRoom','class_id');
    }

    /**
     * Attachments belonging to this Denme
     */
    public function attachments(){

        return $this->morphMany('App\Attachment','attachmentable');
    }
 
}
