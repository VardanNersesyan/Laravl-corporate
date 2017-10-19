<?php

use Illuminate\Database\Seeder;
use Corp\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'Admin'],
            ['name' => 'Moderator'],
            ['name' => 'Guest'],
        ]);
    }
}
