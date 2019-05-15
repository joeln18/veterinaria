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

        $adminRol = Rol::where('name', 'admin')->first();
        $userRol = Rol::where('name', 'user')->first();
        
        $admin = User::create([
            'name' => 'admin',
            'email' => 'joeln18@hotmail.com',
            'password' => bcrypt('admin')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'joel@gmail.com',
            'password' => bcrypt('user')
        ]);
        
        $admin->rols()->attach($adminRol);
        $user->rols()->attach($userRol);
    }
}
