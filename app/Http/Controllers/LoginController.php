<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        $users = DB::table('users')->where('username', $request->username)->get("role");
        

        foreach($users as $user){
            $role = $user->role;
        }

        if (Auth::attempt($credentials)) {
            
            $request->session()->put('role', $role);

            if ($role == 'user') {
                return redirect()->route('user_consultation_record');
            } else {
                return redirect()->route('getUserupdate');
            }    
        }
        return back()->withErrors([
            "Invalid login"
        ]);

    }

        
}