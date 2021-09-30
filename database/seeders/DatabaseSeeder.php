<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institution;
use App\Models\Solicitation;
use App\Models\Trainer;
use App\Models\Category;
use App\Models\Subcategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Trainer::factory()->count(25)->create(); 
        Institution::factory()->count(35)->create(); 
        
        $this->call([
            UserSeeder::class, 
            PermissionRoleSeeder::class,
            CategorySeeder::class, 
        ]);

        
        Solicitation::factory()->count(85)->create(); 
        Subcategory::factory()->count(25)->create(); 

        $solicitations = Solicitation::all(); 
        $categories = Category::all();

        Solicitation::all()->each(function($solicitations) use($categories){
            $cat = Category::find(rand(1,8));
            $solicitations->categories()->attach($cat);
        });
 
    }
}
