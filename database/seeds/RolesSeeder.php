<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SAdministrador = Role::create([
            'name' => 'super-admin',
        ]);

        $Administrador = Role::create([
            'name' => 'Administrador',
        ]);

        $Docente = Role::create([
            'name' => 'Docente',
        ]);

        $Coordinador = Role::create([
            'name' => 'Coordinador',
        ]);

        $Bibliotecario = Role::create([
            'name' => 'Bibliotecario',
        ]);

        $Estudiante = Role::create([
            'name' => 'Estudiante',
        ]);
    }
}
