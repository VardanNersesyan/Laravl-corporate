<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(FiltersSeeder::class);
        $this->call(PortfoliosSeeder::class);
        $this->call(CommentsSeeder::class);
        $this->call(SlidersSeeder::class);
        $this->call(MenusSeeder::class);
        $this->call(PermissionsSeed::class);
        $this->call(RoleSeed::class);
    }
}
