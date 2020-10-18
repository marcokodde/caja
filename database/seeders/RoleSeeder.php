<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\excellsus\models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run() {
		Role::create([
			'name' => 'admin',
			'description' => 'Administrador General',
			'full_access' => 1,
		]);

		Role::create([
			'name' => 'Registrado',
			'description' => 'Usuario Registrado',
		]);

		Role::create([
			'name' => 'No Registrado',
			'description' => 'No Registrado',
		]);

		Role::create([
			'name' => 'guest',
			'description' => 'Invitado',
		]);
	}
}
