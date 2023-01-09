<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('view_bap');
        $role->givePermissionTo('create_bap');
        $role->givePermissionTo('delete_bap');
        $role->givePermissionTo('update_bap');
        $role->givePermissionTo('assign_petugas');
        $role->givePermissionTo('finish_bap');
        $role->givePermissionTo('undone_bap');
        $role->givePermissionTo('view_report');
        $role->givePermissionTo('fix_bap');

        $role = Role::create(['name' => 'petugas_umum']);
        $role->givePermissionTo('fix_bap');
        $role->givePermissionTo('finish_bap');
        $role->givePermissionTo('undone_bap');

        $role = Role::create(['name' => 'koordinator_umum']);
        $role->givePermissionTo('view_bap');
        $role->givePermissionTo('assign_petugas');
        $role->givePermissionTo('finish_bap');
        $role->givePermissionTo('undone_bap');
        $role->givePermissionTo('view_report');

        $role = Role::create(['name' => 'dosen']);
        $role->givePermissionTo('create_bap');

        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo('view_report');
    }
}
