<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\MainShop;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // MainShop::factory(5)->create();
        Category::factory(2000)->create();
    }
}
