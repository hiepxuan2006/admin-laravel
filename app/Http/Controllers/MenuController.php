<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Traits\TraitsSoftDelete;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    use TraitsSoftDelete;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    public function getMenu($parentID)
    {
        $data = $this->menu->all();
        $recusive = new MenuRecusive($data);
        $htmlOption = $recusive->MenuRecusiveAdd($parentID);
        return $htmlOption;
    }
    public function create()
    {
        $htmlOption = $this->getMenu('');
        return view('admin.menu.addMenu', compact('htmlOption'));
    }
    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menu.indexMenu', compact('menus'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            "name" => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect(route('menu.create'));
    }
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menu.editMenu', compact('menu', 'htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            "name" => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect(route('menu.index'));
    }
    public function del($id)
    {
        return $this->TraitsSoftDelete($id, $this->menu);
    }
}
