<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $backend = Menu::updateOrCreate([
            'name'              => 'backend',
            'description'       => 'This is backend sidebar',
            'deletable'         => false,
            'is_active'         => true,
        ]);

        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'divider',
            'parent_id'         => null,
            'order'             => 1,
            'divider_title'     => 'Menus',
            'icon_color_class'  => 'icon-color-1',
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 2,
            'title'             => 'Dashboard',
            'url'               => "/app/dashboard",
            'icon_class'        => 'bx bx-home-alt',
            'icon_color_class'  => 'icon-color-2',
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 3,
            'title'             => 'Pages',
            'url'               => "/app/pages",
            'icon_class'        => 'bx bx-message-add',
            'icon_color_class'  => 'icon-color-3',
        ]);

        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'divider',
            'parent_id'         => null,
            'order'             => 4,
            'divider_title'     => 'Access Control'
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 5,
            'title'             => 'Roles',
            'url'               => "/app/roles",
            'icon_class'        => 'bx bx-accessibility',
            'icon_color_class'  => 'icon-color-4',
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 6,
            'title'             => 'Users',
            'url'               => "/app/users",
            'icon_class'        => 'bx bx-user',
            'icon_color_class'  => 'icon-color-5',
        ]);

        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'divider',
            'parent_id'         => null,
            'order'             => 7,
            'divider_title'     => 'System'
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 8,
            'title'             => 'Menus',
            'url'               => "/app/menus",
            'icon_class'        => 'bx bx-menu',
            'icon_color_class'  => 'icon-color-6',
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 9,
            'title'             => 'Backups',
            'url'               => "/app/backups",
            'icon_class'        => 'bx bx-cloud',
            'icon_color_class'  => 'icon-color-7',
        ]);
        MenuItem::updateOrCreate([
            'menu_id'           => $backend->id,
            'type'              => 'item',
            'parent_id'         => null,
            'order'             => 10,
            'title'             => 'Settings',
            'url'               => "/app/settings/general",
            'icon_class'        => 'bx bx-cog',
            'icon_color_class'  => 'icon-color-8',
        ]);
    }
}
