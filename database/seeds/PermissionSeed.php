<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users_manage']);
        //BAP MANAGEMENT
        Permission::create(['name' => 'view_bap']);
        Permission::create(['name' => 'create_bap']);
        Permission::create(['name' => 'delete_bap']);
        Permission::create(['name' => 'update_bap']);
        Permission::create(['name' => 'fix_bap']);
        //END of BAP MANAGEMENT
        //BAP ASSIGNMENT
        Permission::create(['name' => 'assign_petugas']);
        Permission::create(['name' => 'finish_bap']);
        Permission::create(['name' => 'undone_bap']);
        //END of BAP BAP ASSIGNMENT
        //REPORT MANAGEMENT
        Permission::create(['name' => 'view_report']);
        //END of REPORT MANAGEMENT
    }
}
