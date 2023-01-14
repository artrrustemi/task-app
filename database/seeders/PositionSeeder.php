<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'To Do',
        ]);
    
        DB::table('positions')->insert([
            'name' => 'In Progress',
        ]);
        DB::table('positions')->insert([
            'name' => 'Code Review',
        ]);
        DB::table('positions')->insert([
            'name' => 'Dev Complete',
        ]);
        DB::table('positions')->insert([
            'name' => 'Qa',
        ]);
        DB::table('positions')->insert([
            'name' => 'Done',
        ]);
    }
}
