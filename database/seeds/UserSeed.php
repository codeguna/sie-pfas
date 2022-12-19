<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

        $user = User::create([
            'name' => 'Tantan Aries',
            'email' => 'tantan@mail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('petugas_umum');

        $user = User::create([
            'name' => 'Hendi K',
            'email' => 'hendi@mail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('petugas_umum');
    }
}
