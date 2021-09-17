<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            // DB::table('users')->insert([
            //     'first_name' => 'Heidy',
            //     'last_name' => 'Miguel',
            //     'gender' => 'm',
            //     'dob' => now(),
            //     'city' => 'luanda',
            //     'cidade do kilamba, ed. B24, apt 6',
            //     'phone_one' => '923963456',
            //     'email' => 'admin@gmail.com',
            //     'rate' => 6500,
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // ]);

            // DB::table('users')->insert([
            //     'first_name' => 'Jorge',
            //     'last_name' => 'Sampaio',
            //     'email' => 'admin@gmail.com',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // ]);

            DB::table('admins')->insert([
                'name' => 'Admin', 
                'phone' => '929211321', 
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
    }
}
