<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    //
    protected $table = 'series';
    protected $primaryKey = "serie_id";
    protected $with=['actors:name','directors:name'];
    protected $hidden = ['created_at','updated_at'];

    

    public function actors(){
    	return $this->belongsToMany('App\actors','serie_actor','serie_id','actor_id')->as('relationship');
    }
	
	public function directors (){
    	return $this->belongsToMany('App\directors','serie_director','serie_id','director_id')->as('relationship');
    }
    
}
