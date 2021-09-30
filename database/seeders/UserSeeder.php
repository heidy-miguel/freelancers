<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('users')->insert([
                'name' => 'Heidy Miguel',
                'phone' => '923963456',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);

            // DB::table('users')->insert([
            //     'first_name' => 'Jorge',
            //     'last_name' => 'Sampaio',
            //     'email' => 'admin@gmail.com',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // ]);

            DB::table('users')->insert([
                'name' => 'Herodes Barbosa',  
                'phone' => '900000000', 
                'email' => 'herodes.barbosa@freelancersconsulting.ao',
                'password' => Hash::make('nM?r~XX8kZZx'),
            ]);

            DB::table('users')->insert([
                'name' => 'Emílio Ferreira',  
                'phone' => '911111111', 
                'email' => 'emilio.ferreira@freelancersconsulting.ao',
                'password' => Hash::make('eD!or=E}UyCn'),
            ]);

            DB::table('users')->insert([
                'name' => 'Kassio Barbosa',  
                'phone' => '922222222', 
                'email' => 'kassio.barbosa@freelancersconsulting.ao',
                'password' => Hash::make('Br+2KdcH)zwo'),
            ]);

            DB::table('users')->insert([
                'name' => 'Vatiara António',  
                'phone' => '922222222', 
                'email' => 'vatiara.antonio@freelancersconsulting.ao',
                'password' => Hash::make('QVPmA-}N%=N^'),
            ]);
    }
}
