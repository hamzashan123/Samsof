<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Media Releases',
        ]);
        Category::create([
            'title' => 'Media Coverage',
        ]);
        Category::create([
            'title' => 'SASMFOS Opinions',
        ]);
    }
}
