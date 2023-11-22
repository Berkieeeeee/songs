<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            [
                'title' => 'Song1',
                'singer' => 'Artist 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Song 2',
                'singer' => 'Artist 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Song 3',
                'singer' => 'Artist 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Song 4',
                'singer' => 'Artist 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Song 5',
                'singer' => 'Artist 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

