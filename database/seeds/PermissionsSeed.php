<?php

use Illuminate\Database\Seeder;
use Corp\Permission;

class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['name' => 'VIEW_ADMIN'],
            ['name' => 'VIEW_ACCESS'],
            ['name' => 'EDIT_PERMISSIONS'],
            ['name' => 'VIEW_ARTICLES'],
            ['name' => 'ADD_ARTICLES'],
            ['name' => 'UPDATE_ARTICLES'],
            ['name' => 'DELETE_ARTICLES'],
            ['name' => 'VIEW_PORTFOLIO'],
            ['name' => 'ADD_PORTFOLIO'],
            ['name' => 'EDIT_PORTFOLIO'],
            ['name' => 'DELETE_PORTFOLIO'],
            ['name' => 'VIEW_SLIDER'],
            ['name' => 'ADD_SLIDER'],
            ['name' => 'EDIT_SLIDER'],
            ['name' => 'DELETE_SLIDER'],
            ['name' => 'VIEW_MENU_PAGE'],
            ['name' => 'EDIT_MENU'],
            ['name' => 'UPDATE_MENU'],
            ['name' => 'DELETE_MENU'],
            ['name' => 'VIEW_USERS'],
            ['name' => 'CREATE_USERS'],
            ['name' => 'EDIT_USERS'],
            ['name' => 'DELETE_USERS'],
        ]);
    }
}
