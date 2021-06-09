<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\user;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name' => 'Administrador General',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password'),
        ])->roles()->sync([1]);

        User::create([
			'name' => 'Usuario Genral',
			'email' => 'soporte@admin.com',
			'password' => Hash::make('password'),
        ])->roles()->sync([2]);
    }
}
