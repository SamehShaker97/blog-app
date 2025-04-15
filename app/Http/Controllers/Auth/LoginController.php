<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_page(){
        return view('Auth.login');
    }
    public function store(StoreLoginRequest $request){
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            if(auth()->user()->user_type == 'admin'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('home');
            }
        }
        return back()->withErrors(['message' => 'Invalid Credentials']);
    }
}
