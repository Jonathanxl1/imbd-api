<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class directors extends Model
{
    protected $table = 'directors';
    protected $primaryKey = "director_id";

    // public function series(){
    // 	return $this->belongsToMany('App\series');
    // }

    // public function movies(){
    // 	return $this->belongsToMany('App\movies');
    // }

    
}
