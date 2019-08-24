<?php

use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TBL_Planes')->insert([
            [
                'nombre' => 'Elite'
            ],
            [
                'nombre' => 'Silver'
            ],
            [
                'nombre' => 'Diamond'
            ]
        ]);
    }
}
