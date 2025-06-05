<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        $google_user = Socialite::driver('google')->user();
        $user = User::where('email', $google_user->email)->first();
        if($user){
            Auth::login($user);
            return redirect()->route('home');
        }
        $user = User::create([
            'name' => $google_user->name,
            'email' => $google_user->email,
            'password' => Hash::make(Str::random(10)),
            'email_verified_at' => now(),
        ]);
        Auth::login($user);
        return redirect()->route('home');
    }
}
