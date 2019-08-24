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
        DB::table('TBL_Colegios')->insert([
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
