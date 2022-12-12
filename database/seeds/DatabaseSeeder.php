<?php

use Database\Seeders\FacilitySeeder;
use Database\Seeders\MataKuliahSeeder;
use Database\Seeders\RoomSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(FacilitySeeder::class);
        $this->call(MataKuliahSeeder::class);
        $this->call(RoomSeeder::class);
    }
}
