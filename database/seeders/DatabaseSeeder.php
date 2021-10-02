<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Application;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PermissionRoleSeeder::class,
        ]);  

        User::factory()->count(40)->create();
        Application::factory()->count(70)->create();

        $app = Application::all();
        Application::all()->each(function($app){
            $cat = Category::find(rand(1, 8));
            $app->category()->associate($cat);
        });
    }
}
