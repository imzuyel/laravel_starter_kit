<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class BackendSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        $menuItem = Menu::where('is_active',true)->orderBy('updated_at', 'desc')->first();
        $items=menu($menuItem->name);
        return view('components.backend-sidebar',compact('items'));
    }
}
