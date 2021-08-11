<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = array('língua portuguesa', 'gestão', 'direito', 'banca', 'foro comportamental');
        
        foreach($categories as $category){
            DB::table('course_categories')->insert([
                'name' => $category,
                'created_at' => now()
            ]);
        }
    }
}
