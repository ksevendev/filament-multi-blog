<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kseven\FilamentMultiBlog\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Notices', 'slug' => 'notices', 'site_id' => 1]);
        Category::create(['name' => 'Tutorials', 'slug' => 'tutorials', 'site_id' => 1]);
    }
}
