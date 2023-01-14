<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubTaskSeeder extends Seeder
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
                DB::table('sub_tasks')->insert([
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'position' => rand(1,3),
                    'task_id' => rand(1,100),
                    'created_at' => $faker->dateTimeBetween('-2 week')
                ]);    
            }else{
                $faker = Faker::create();
                DB::table('sub_tasks')->insert([
                    'name' => $faker->name,
                    'description' => $faker->text,
                    'position' => rand(1,3),
                    'task_id' => rand(1,100),
                    'created_at' => $faker->dateTimeBetween('-2 week')
                ]);
            }
        }
    }
}
