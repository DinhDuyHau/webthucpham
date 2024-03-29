<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use Illuminate\Http\Request;

class PermisstionController extends Controller
{
    public function create(){
        return view('permisstion.add');
    }
    public function store(Request $request){
        $permisstions = Permisstion::create([
           'name' => $request->modul_parent,
            'display_name' =>$request->modul_parent,
            'parent_id' => 0
        ]);
        foreach ($request->modul_child as $value){
            Permisstion::create([
                'name' =>$value,
                'display_name' => $value,
                'parent_id' => $permisstions->id,
                'key_code' => $request->modul_parent . '_' . $value
            ]);
        }
        return redirect()->route('create_permisstion');
    }
}
