<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function admin_page(){
        $users = User::all();
        $posts = Post::all();
        $messages = Message::all();
        return view('admin.dashboard' , 
        [ 
            'users' => $users->count(),
            'posts' => $posts->count(), 
            'messages' => $messages->count()
        ]);
    }
    public function messages(){
        $messages = Message::all();
        return view('admin.messages.index', ['messages' => $messages]);
    }
    public function delete_message($id){
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('messages')->with('success', 'Message deleted successfully');
    }
    public function users_Page(){
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.home')->with('success', 'User deleted successfully');
    }
}
