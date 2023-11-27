<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            [
                'name' => 'Album 1',
                'year' => 2005,
                'times_sold' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Album 2',
                'year' => 2012,
                'times_sold' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Album 3',
                'year' => 2018,
                'times_sold' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Album 4',
                'year' => 2008,
                'times_sold' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Album 5',
                'year' => 2015,
                'times_sold' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
