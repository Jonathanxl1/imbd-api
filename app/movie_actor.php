<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class movie_actor extends Pivot
{
    protected $table = 'movie_director';
    
}
