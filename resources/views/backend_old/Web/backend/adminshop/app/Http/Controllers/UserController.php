<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use DeleteModelTrait;
    private $users;
    private $roles;
    public function __construct(User $user, Role $role)
    {
        $this->users = $user;
        $this->roles = $role;
    }

    public function index(){
        $userd = $this->users->Simplepaginate(5);
        return view('user.index', compact('userd'));
    }
    public function create(){
        $roless = $this->roles->all();
        return view('user.add', compact('roless'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $user =$this->users->create([
                'name' => $request->name,
                'email' =>$request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            $user->roleid()->attach($request->role_id);
            return redirect()->route('user_index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . '---line: ' . $exception->getLine());
        }

    }


    public function edit($id){
        $role = $this->roles->all();
        $user = $this->users->find($id);
        $rolees = $user->roleid;
        return view('user.edit', compact('role','user', 'rolees'));
    }


    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $this->users->find($id)->update([
                'name' => $request->name,
                'email' =>$request->email
            ]);
            $user = $this->users->find($id);
            $user->roleid()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user_index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '. $exception->getMessage() . '---line: ' . $exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->users);

    }
}
