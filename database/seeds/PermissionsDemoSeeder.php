<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view.admin']);

        // create roles and assign existing permissions
        $roleOne = Role::create(['name' => 'vigilant']);
        Role::create(['name' => 'common-user']);

        $roleOne->givePermissionTo('view.admin');

        // create a demo user
        $user = Factory(App\Models\User::class)->create([
            'name' => 'Admin 2',
            'email' => 'admin2@admin.com',
            // factory default password is 'password'
        ]);

        $user->assignRole($roleOne);
    }
}