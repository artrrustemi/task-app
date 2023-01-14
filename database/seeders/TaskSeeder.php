<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100; $i++){
            if($i%2==0){
                $faker = Faker::create();
                DB::table('tasks')->insert([
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'position' => rand(1,6),
                    'priority_id' => rand(1,3),
                    'finished_at' => $faker->dateTimeBetween('-1 week', '+1 week'),
                    'created_at' => $faker->dateTimeBetween('-2 week')
                ]);    
            }else{
                $faker = Faker::create();
                DB::table('tasks')->insert([
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'position' => rand(1,6),
                    'priority_id' => rand(1,3),
                    'finished_at' => null,
                    'created_at' => $faker->dateTimeBetween('-2 week')
                ]);
            }
        }
    }
}
