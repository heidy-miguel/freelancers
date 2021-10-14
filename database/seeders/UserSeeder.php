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
                'role' => 'admin',
                'email' => 'heidyfortunato@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);

            DB::table('users')->insert([
                'name' => 'Carlos',
                'surname' => 'Barbosa',
                'role' => 'admin',  
                'email' => 'carlos.barbosa@freelancersconsulting.ao',
                'password' => Hash::make('H0q]h4eN$*@d'),
            ]);

            DB::table('users')->insert([
                'name' => 'Elaine',  
                'surname' => 'Roberto',  
                'role' => 'admin',
                'email' => 'elaine.roberto@freelancersconsulting.ao',
                'password' => Hash::make('Rt_&4g_FYPJw'),
            ]);

            DB::table('users')->insert([
                'name' => 'Herodes', 
                'surname' => 'Barbosa', 
                'role' => 'admin', 
                'email' => 'herodes.barbosa@freelancersconsulting.ao',
                'password' => Hash::make('nM?r~XX8kZZx'),
            ]);

            DB::table('users')->insert([
                'name' => 'Kassio',
                'surname' => 'Barbosa',
                'role' => 'manager',  
                'email' => 'kassio.barbosa@freelancersconsulting.ao',
                'password' => Hash::make('Br+2KdcH)zwo'),
            ]);

            DB::table('users')->insert([
                'name' => 'Adilson', 
                'surname' => 'Nhamina', 
                'role' => 'manager', 
                'email' => 'adilson.nhamina@freelancersconsulting.ao',
                'password' => Hash::make('0Iv-67pU^bTP'),
            ]);


            DB::table('users')->insert([
                'name' => 'Vatiara', 
                'surname' => 'António', 
                'role' => 'manager', 
                'email' => 'vatiara.antonio@freelancersconsulting.ao',
                'password' => Hash::make('QVPmA-}N%=N^'),
            ]);

            DB::table('users')->insert([
                'name' => 'Josefina', 
                'surname' => 'Costa', 
                'role' => 'manager', 
                'email' => 'josefina.costa@freelancersconsulting.ao',
                'password' => Hash::make('U&M72_z}+bDd'),
            ]);

            DB::table('users')->insert([
                'name' => 'Aldo', 
                'surname' => 'Coelho', 
                'role' => 'manager', 
                'email' => 'aldo.coelho@freelancersconsulting.ao',
                'password' => Hash::make('47f=}1d!jWm?'),
            ]);

            DB::table('users')->insert([
                'name' => 'Emílio', 
                'surname' => 'Ferreira', 
                'role' => 'manager', 
                'email' => 'emilio.ferreira@freelancersconsulting.ao',
                'password' => Hash::make('eD!or=E}UyCn'),
            ]);


    }
}
