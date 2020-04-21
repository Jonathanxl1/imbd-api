<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actors extends Model
{
	protected $table = 'actors';
	protected $primaryKey = "actor_id";

    // public function series(){
    // 	return $this->belongsToMany('App\series');
    // }

    // public function movies(){
    // 	return $this->belongsToMany('App\movies');
    // }
}
