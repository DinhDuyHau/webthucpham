<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
//        dd(bcrypt('12345678'));
        return view('login');
    }

    public function postlogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt([
            'email' =>$email,
            'password' =>$password
        ])){
            $user = User::where('email', $email)->first();
            Auth::login($user);
            return redirect('home');
        }
    }

    public function postlogout(){
        Auth::logout();
        return redirect()->route('login');
    }


}
