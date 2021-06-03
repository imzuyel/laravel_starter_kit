<?php

use App\Models\Menu;

if (!function_exists('menu')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function menu($name)
    {
        $menu = Menu::where('name',$name)->first();
        return $menu->menuItems()->with('childs')->get();
    }
}
