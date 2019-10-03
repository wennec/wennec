<?php

use Illuminate\Database\Seeder;

class DeptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_colegios')->insert([
            [
                'nombre' => 'Jhon F. Kenndy',
                'descripcion' => 'nueva1',
            ],
            [
                'nombre' => 'Nueva Granada',
                'descripcion' => 'nueva2'
            ],
        ]);
    }
}
