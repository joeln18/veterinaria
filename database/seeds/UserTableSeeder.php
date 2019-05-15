<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $adminRol = Rol::where('nombre', 'administrador')->first();
        $userRol = Rol::where('nombre', 'usuario')->first();
        
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'joeln18@hotmail.com',
            'password' => bcrypt('admin')
        ]);

        $user = User::create([
            'name' => 'Usuario',
            'email' => 'joel@gmail.com',
            'password' => bcrypt('user')
        ]);
        
        $admin->rols()->attach($adminRol);
        $user->rols()->attach($userRol);
    }
}
