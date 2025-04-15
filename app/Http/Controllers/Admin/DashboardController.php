<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);
        return view('admin.posts.index', ["posts" => $posts]);
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.home');
    }
    public function accept_posts($id){
        $post = Post::find($id);
        $post->status = 'active';
        $post->save();
        return redirect()->route('posts.home');
    }
    public function reject_posts($id){
        $post = Post::find($id);
        $post->status ='rejected';
        $post->save();
        return redirect()->route('posts.home');
    }
}
