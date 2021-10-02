<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin_role = Role::create(['name' => 'admin']);
        $trainer_role = Role::create(['name' => 'trainer']);
        $institution_role = Role::create(['name' => 'institution']);
        $manager_role = Role::create(['name' => 'manager']);


        $users = User::where('role', '=', 'admin');
        foreach ($users as $user) {
            $user->assignRole($admin_role);
        }

        $users = User::where('role', '=', 'manager');
        foreach ($users as $user) {
            $user->assignRole($manager_role);
        }

        $users = User::where('role', '=', 'trainer');
        foreach ($users as $user) {
            $user->assignRole($trainer_role);
        }

        $users = User::where('role', '=', 'institution');
        foreach ($users as $user) {
            $user->assignRole($institution_role);
        }
    }
}
