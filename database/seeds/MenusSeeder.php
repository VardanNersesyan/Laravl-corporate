<?php

use Illuminate\Database\Seeder;
use Corp\Menu;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'title'  => 'Main',
                'path'   => config('app.url'),
                'parent' => 0
            ],
            [
                'title'  => 'Blog',
                'path'   => config('app.url') . '/articles',
                'parent' => 0
            ],
            [
                'title'  => 'Computers',
                'path'   => config('app.url') . '/articles/cat/computers',
                'parent' => 2
            ],
            [
                'title'  => 'Interesting',
                'path'   => config('app.url') . '/articles/cat/iteresting',
                'parent' => 2
            ],
            [
                'title'  => 'Advices',
                'path'   => config('app.url') . '/articles/cat/advices',
                'parent' => 2
            ],
            [
                'title'  => 'Portfolios',
                'path'   => config('app.url') . '/portfolios',
                'parent' => 0
            ],
            [
                'title'  => 'Contacts',
                'path'   => config('app.url') . '/contacts',
                'parent' => 0
            ],
        ]);
    }
}
