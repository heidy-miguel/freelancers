<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TraineeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('trainees')->insert([
                'name' => 'ansa',
                'address' => 'maculusso, zona 20, rua pedro mendonça ed. 5, apt 15',
                'city' => 'luanda',
                'phone' => '923963147',
                'email' => 'geral@ansa.com',
                'description' => 'Lorem ipselum...',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]); 
    }
}
