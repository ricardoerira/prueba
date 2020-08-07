<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["name" => "super-admin"]);
        Role::create(["name" => "vigilant"]);
        Role::create(["name" => "common-user"]);
    }
}
