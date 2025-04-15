<?php

namespace App\Http\Controllers\User\pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $posts = Post::where('status' , 'active')->get();
        return view('user.pages.profile' , ["posts" => $posts]);
    }
    public function change_password(Request $request , $id){
        $user = User::findOrFail($id);
        if(Hash::check($request->old_password , $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success' , 'Password changed successfully');
        }
        return redirect()->back()->with('error' , 'Current password is incorrect');

    }
}
