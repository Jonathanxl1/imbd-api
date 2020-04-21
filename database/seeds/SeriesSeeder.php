<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        factory(App\series::class,10)->create()->each(function($serie){
            $serie->directors()->save(factory(App\directors::class)->make());
            $serie->actors()->save(factory(App\actors::class)->make());

        });


    }
}
