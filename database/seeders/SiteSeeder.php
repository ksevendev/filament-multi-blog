<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kseven\FilamentMultiBlog\Models\Site;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        Site::factory()->create(['name' => 'Site Principal', 'domain' => 'localhost']);
    }
}
