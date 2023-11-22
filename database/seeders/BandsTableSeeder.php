<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
            [
                'name' => 'Band 1',
                'genre' => 'Rock',
                'founded' => 2000,
                'active_till' => 'Heden',
            ],
            [
                'name' => 'Band 2',
                'genre' => 'Pop',
                'founded' => 1995,
                'active_till' => 'Heden',
            ],
            [
                'name' => 'Band 3',
                'genre' => 'Metal',
                'founded' => 2010,
                'active_till' => '2022',
            ],
        ];

        foreach ($bands as $band) {
            DB::table('bands')->insert([
                'name' => $band['name'],
                'genre' => $band['genre'],
                'founded' => $band['founded'],
                'active_till' => $band['active_till'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
