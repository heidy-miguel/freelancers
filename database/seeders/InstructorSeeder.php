<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('instructors')->insert([
                'first_name' => 'joão',
                'middle_name' => 'carlos',
                'last_name' => 'monteiro',
                'birth_date' => '1990-12-23',
                'email' => 'joaocarlos@gmail.com',
                'city' => 'luanda',
                'phone' => '926456996',
                'address' => 'martires, rua 23 zona 12',
                'rate' => 6500,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]); 
    }
}
