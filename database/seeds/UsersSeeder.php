<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'names' => 'Ulises Jacob',
            'name' => 'super-admin',
            'paternal_surname' => 'Calva',
            'maternal_surname' => 'Robledo',
            'email' => 'ulises.jacob.cr@gmail.com',
            'password' => bcrypt('administrador')
        ]);

        $superAdmin->assignRole('super-admin');

        $superAdmin1 = User::create([
            'names' => 'Isaac',
            'paternal_surname' => 'Cruz',
            'maternal_surname' => 'Herrera',
            'name' => 'isaac',
            'email' => 'crherrera94@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $superAdmin->assignRole('super-admin');
    }
}
