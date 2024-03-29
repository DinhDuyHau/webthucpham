<?php

namespace App\Http\Controllers;

use App\Component\RecursiveMenu;
use App\Models\Menu;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    use DeleteModelTrait;
    private $menu;
    private $recursiveMenu;
    public function __construct(RecursiveMenu $recursiveMenu, Menu $menu)
    {
        $this->menu = $menu;
        $this->recursiveMenu = $recursiveMenu;
    }


    public function  index(){
        $menus = $this->menu->Simplepaginate(5);
        return view('menus.index', compact('menus'));
    }

    public  function  create(){
        $optionmenu = $this->recursiveMenu->menuRecursiveadd();
        return view('menus.add', compact('optionmenu'));
    }

    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request -> parent_id,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->route('menu_index');
    }

    public function edit($id)
    {
        $Menuedit = $this->menu->find($id);
        $optionmenu = $this->recursiveMenu->menuRecursivedit($Menuedit->parent_id);
        return view('menus.edit', compact('optionmenu', 'Menuedit'));
    }

    public function update($id, Request $request){
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request -> parent_id,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->route('menu_index');
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->menu);
    }
}
