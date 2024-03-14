<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Support\Facades\Validator;
use App\Models\User;  


class AuthenticationController extends Controller 
{

    public function index()
    { 
        return view('loginView'); 
    }


    public function login(Request $request) 
    {

        if(Auth::attempt($request->only('user_name','password'))){

            $user = User::where('user_name', $request['user_name'])->first(); 

            $token = $user->createToken('auth_token')->plainTextToken; 

            return redirect()->intended('/administration');
        }
        return redirect()->back()->with('fail','Invalid Credentials, Try Again');  

    }
 
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->user()->tokens()->delete();
        return redirect('/login');
    }
}
