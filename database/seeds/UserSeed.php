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
            'email' => 'admin@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

        $user = User::create([
            'name' => 'Tantan Aries',
            'email' => 'tantan@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('petugas_umum');

        $user = User::create([
            'name' => 'Hendi K',
            'email' => 'hendi@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('petugas_umum');

        $user = User::create([
            'name' => 'Bambang K',
            'email' => 'bambang@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('koordinator_umum');

        $user = User::create([
            'name' => 'Dosen - Dani',
            'email' => 'dani@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('dosen');

        $user = User::create([
            'name' => 'Kiki S',
            'email' => 'kiki@lpkia.ac.id',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('manager');
    }
}
