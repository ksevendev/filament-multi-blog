<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kseven\FilamentMultiBlog\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Notícias', 'slug' => 'noticias', 'site_id' => 1]);
        Category::create(['name' => 'Tutoriais', 'slug' => 'tutoriais', 'site_id' => 1]);
    }
}
