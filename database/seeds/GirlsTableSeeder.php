<?php

use Illuminate\Database\Seeder;

class GirlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ne_NP');
        for ($i=0;$i<500;$i++){
            \App\Girl::create([
                'name'=>$faker->name,
                'lat'=>$faker->unique()->latitude(25,30),
                'lng'=>$faker->unique()->longitude(26,34),
            ]);
        }
    }
}
