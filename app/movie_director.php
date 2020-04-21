<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class movie_director extends Pivot
{
    protected $table = 'movie_director';
}
