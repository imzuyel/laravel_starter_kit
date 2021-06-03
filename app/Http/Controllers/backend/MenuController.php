<?php

namespace App\Http\Controllers\backend;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{

    public function index()
    {
        Gate::authorize('app.menus.index');
        $menus = Menu::latest('id')->get();
        return  view('backend.menus.index', compact('menus'));
    }

    public function create()
    {
        Gate::authorize('app.menus.create');
        return view('backend.menus.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|string|unique:menus',
            'description'   => 'string',

        ]);
        Menu::create([
            'name' => Str::slug($request->name),
            'description'   => $request->description,
            'deletable'     => true
        ]);
        toastr()->success('Menu Successfully Added.', 'Added');
        return redirect()->route('app.menus.index');
    }

    public function edit(Menu $menu)
    {
        Gate::authorize('app.menus.edit');
        return view('backend.menus.form', compact('menu'));
    }


    public function update(Request $request, Menu $menu)
    {
        $menu->update([
            'name'          => Str::slug($request->name),
            'description'   => $request->description,
        ]);
        toastr()->success('Menu Successfully Updated.', 'Updated');
        return redirect()->route('app.menus.index');
    }


    public function destroy(Menu $menu)
    {
        Gate::authorize('app.menus.destroy');
        if ($menu->deletable == true) {
            $menu->delete();
            toastr()->success('Menu Successfully Deleted.', 'Deleted');
        } else {
            toastr()->error('Sorry you can\'t delete system menu.', 'Error');
        }
        return redirect()->back();
    }
}
