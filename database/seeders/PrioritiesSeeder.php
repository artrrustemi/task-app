<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'name' => 'High',
        ]);
    
        DB::table('priorities')->insert([
            'name' => 'Low',
        ]);
        DB::table('priorities')->insert([
            'name' => 'Blocker',
        ]);
    
    }
}
