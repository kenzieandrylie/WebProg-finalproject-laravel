<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => "RPG"
        ]);
        DB::table('genres')->insert([
            'name' => "Arcade"
        ]);
        DB::table('genres')->insert([
            'name' => "FPS"
        ]);
        DB::table('genres')->insert([
            'name' => "Sports"
        ]);
        DB::table('genres')->insert([
            'name' => "MOBA"
        ]);
    }
}
