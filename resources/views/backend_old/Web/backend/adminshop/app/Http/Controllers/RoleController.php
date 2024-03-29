<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use DeleteModelTrait;
    private $roles;
    private $permisstion;
    public function __construct(Role $role, Permisstion $permisstion)
    {
        $this->roles = $role;
        $this->permisstion = $permisstion;
    }

    public function index(){
        $role = $this->roles->Simplepaginate(5);
        return view('roles.index', compact('role'));
    }

    public function create(){
        $permisstion = $this->permisstion->where('parent_id', 0)->get();
        return view('roles.add', compact('permisstion'));
    }
    public function store(Request $request){
        $role = $this->roles->create([
           'name' =>$request->name,
            'display_name' => $request->display_name

        ]);
        $role->permisstions()->attach($request->permisstion_id);
        return redirect()->route('role_index');

    }
    public function edit($id){

        $permisstion = $this->permisstion->where('parent_id', 0)->get();
        $rolesss = $this->roles->find($id);
        $permisstioncheck = $rolesss->permisstions;
        return view('roles.edit', compact('permisstion', 'rolesss', 'permisstioncheck'));
    }

    public function update(Request $request, $id){
        $role = $this->roles->find($id);
        $role->update([
            'name' =>$request->name,
            'display_name' => $request->display_name

        ]);
        $role->permisstions()->sync($request->permisstion_id);
        return redirect()->route('role_index');

    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->roles);
    }

}
