<?php

use Illuminate\Database\Seeder;
use Corp\Filter;
class FiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filter::insert([
            [
                'title' => 'Brand Identity',
                'alias' => 'brand-identity'
            ]
        ]);
    }
}
