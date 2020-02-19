<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->insert([
            [
                'nombre' => 'Super Administrador'
            ],
            [
                'nombre' => 'Administrador'
            ],
            [
                'nombre' => 'Estudiante'
            ],
            [
                'nombre' => 'Docente'
            ],
            [
                'nombre' => 'Acudiente'
            ]
        ]);
    }
}
