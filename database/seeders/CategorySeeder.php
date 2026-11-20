<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Технологии', 'slug' => 'tech'],
            ['name' => 'Наука',      'slug' => 'science'],
            ['name' => 'Спорт',      'slug' => 'sport'],
            ['name' => 'Культура',   'slug' => 'culture'],
        ];

        foreach ($items as $item) {
            Category::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}