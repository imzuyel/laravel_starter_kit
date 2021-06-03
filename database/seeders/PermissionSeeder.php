<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Role Permission
        $moduleAppRole      = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppRole->id,
            'name'          => 'Access Role',
            'slug'          => 'app.roles.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppRole->id,
            'name'          => 'Create Role',
            'slug'          => 'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppRole->id,
            'name'          => 'Edit Role',
            'slug'          => 'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppRole->id,
            'name'          => 'Delete Role',
            'slug'          => 'app.roles.destroy'
        ]);
        //Admin Premission
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppDashboard->id,
            'name'          => 'Access Dashboard',
            'slug'          => 'app.dashboard'
        ]);

        //User Permission
        $moduleAppUser      = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppUser->id,
            'name'          => 'Access user',
            'slug'          => 'app.users.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppUser->id,
            'name'          => 'Create user',
            'slug'          => 'app.users.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppUser->id,
            'name'          => 'Edit user',
            'slug'          => 'app.users.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppUser->id,
            'name'          => 'Delete user',
            'slug'          => 'app.users.destroy'
        ]);


        //App Backup Permission
        $moduleAppBackups   = Module::updateOrCreate(['name' => 'Backup Management']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppBackups->id,
            'name'          => 'Access Backup',
            'slug'          => 'app.backups.index'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppBackups->id,
            'name'          => 'Create Backup',
            'slug'          => 'app.backups.create'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppBackups->id,
            'name'          => 'Download Backup',
            'slug'          => 'app.backups.download'
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppBackups->id,
            'name'          => 'Delete Backup',
            'slug'          => 'app.backups.destroy'
        ]);


        // Profile
        $moduleAppProfile   = Module::updateOrCreate(['name' => 'Profile']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppProfile->id,
            'name'          => 'Update Profile',
            'slug'          => 'app.profile.update',
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppProfile->id,
            'name'          => 'Update Password',
            'slug'          => 'app.profile.password',
        ]);


        // Settings
        $moduleAppSettings  = Module::updateOrCreate(['name' => 'Settings']);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppSettings->id,
            'name'          => 'Access Settings',
            'slug'          => 'app.settings.index',
        ]);
        Permission::updateOrCreate([
            'module_id'     => $moduleAppSettings->id,
            'name'          => 'Update Settings',
            'slug'          => 'app.settings.update',
        ]);

        // Page management
        $moduleAppPage     = Module::updateOrCreate(['name' => 'Page Management']);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppPage->id,
            'name'         => 'Access Pages',
            'slug'         => 'app.pages.index',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppPage->id,
            'name'         => 'Create Page',
            'slug'         => 'app.pages.create',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppPage->id,
            'name'         => 'Edit Page',
            'slug'         => 'app.pages.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppPage->id,
            'name'         => 'Delete Page',
            'slug'         => 'app.pages.destroy',
        ]);

        // Menu management
        $moduleAppMenu     = Module::updateOrCreate(['name' => 'Menu Management']);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppMenu->id,
            'name'         => 'Access Menus',
            'slug'         => 'app.menus.index',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppMenu->id,
            'name'         => 'Create Menu',
            'slug'         => 'app.menus.create',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppMenu->id,
            'name'         => 'Edit Menu',
            'slug'         => 'app.menus.edit',
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppMenu->id,
            'name'         => 'Delete Menu',
            'slug'         => 'app.menus.destroy',
        ]);
    }
}
