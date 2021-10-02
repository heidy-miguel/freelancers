<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            'banca', 'seguros', 'contabilidade', 'finanças',
            'adminisração pública', 'informática', 'formação comportamental',
            'formações técnicas'
            );

        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
