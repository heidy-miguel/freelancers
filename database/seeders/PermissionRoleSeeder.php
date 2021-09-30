<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Institution;

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

        
        // create permissions
        
        // roles
        // $clerk_role = Role::create(['name' => 'escrivão'])->givePermissionTo(
        //     ['create process', 'read process', 'update process']
        // );

        // judge
        // $judge_role = Role::create(['name' => 'juíz'])->givePermissionTo(
        //     ['read process']
        // );

        $user_role = Role::create(['name' => 'admin']);
        $institution_role = Role::create(['guard_name' => 'institution', 'name' => 'institution']);
        $trainer_role = Role::create(['guard_name' => 'trainer', 'name' => 'trainer']);


        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'admin'])->givePermissionTo(
        //     ['create user', 'unpublish articles']
        // );


        // clerk users
        // $users = User::whereBetween('id', [5, 8])->get();
        // foreach ($users as $user) {
        //     $user->assignRole($clerk_role);
        // }
        // $user = User::where('email', 'escrivao@gmail.com')->first();
        // $user->assignRole($clerk_role);

        // criminal judge users
        // $users = User::whereBetween('id', [9, 13])->get();
        // foreach ($users as $user) {
        //     $user->assignRole($criminal_role);
        // }

        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole($user_role);
        }

        $institutions = Institution::all();
        foreach ($institutions as $inst) {
            $inst->assignRole($institution_role);
        }

        $trainers = Trainer::all();
        foreach ($trainers as $trainer) {
            $trainer->assignRole($trainer_role);
        }

    }
}
