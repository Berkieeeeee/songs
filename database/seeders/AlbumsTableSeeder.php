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
            ],
            [
                'name' => 'Album 2',
                'year' => 2012,
                'times_sold' => 75000,
            ],
            [
                'name' => 'Album 3',
                'year' => 2018,
                'times_sold' => 50000,
            ],
            [
                'name' => 'Album 4',
                'year' => 2008,
                'times_sold' => 120000,
            ],
            [
                'name' => 'Album 5',
                'year' => 2015,
                'times_sold' => 90000,
            ],
        ]);

        // // foreach ($albums as $album) {
        //     DB::table('albums')->insert([
        //         'name' => $album['name'],
        //         'year' => $album['year'],
        //         'times_sold' => $album['times_sold'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // // }
    }
}
