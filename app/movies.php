<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    protected $table = 'movies';
    protected $primaryKey = "movie_id";
    protected $with=['actors:name','directors:name'];
    protected $hidden = ['created_at','updated_at'];
    

    
    public function actors (){
    	return $this->belongsToMany('App\actors','movie_actor','movie_id','actor_id')->as('relationship');
    }

    public function directors (){
    	return $this->belongsToMany('App\directors','movie_director','movie_id','director_id')->as('relationship');
    }

     
}
