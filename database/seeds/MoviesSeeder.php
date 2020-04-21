<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;



class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

        factory(App\movies::class,10)->create()->each(function($movie){
            $movie->directors()->save(factory(App\directors::class)->make());
            $movie->actors()->save(factory(App\actors::class)->make());

        });

       
    }
}
