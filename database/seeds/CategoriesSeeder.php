<?php

use Illuminate\Database\Seeder;
use Corp\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'title'     => 'Blog',
                'alias'     => 'blog',
                'parent_id' => 0
            ],
            [
                'title'     => 'Computers',
                'alias'     => 'computers',
                'parent_id' => 1
            ],
            [
                'title'     => 'Iteresting',
                'alias'     => 'iteresting',
                'parent_id' => 1
            ],
            [
                'title'     => 'Advice',
                'alias'     => 'advice',
                'parent_id' => 1
            ]
        ]);
    }
}
