<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class ShowLesson extends Model
{
    protected $fillable = [
        'title',
        'order',
        'src']; 


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
