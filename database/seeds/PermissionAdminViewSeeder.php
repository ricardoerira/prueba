<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionAdminViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([ "name" => "view_admin"]);
    }
}
