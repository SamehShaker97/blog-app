<?php

namespace App\Http\Controllers\User\posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create_post(){
        return view('user.posts.create');
    }
    public function store_post(StorePostsRequest $request){
        $post = new Post();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('uploads/postImage' , 'public');
            $post->image = $image;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = 'pending';
        $post->user_id = auth()->user()->id;
        $post->name = auth()->user()->name;
        $post->user_type = auth()->user()->user_type;
        $post->save();
        return redirect()->route('create_post')->with('success' , 'create post successfully');
    }
    public function edit($id){
        $post= Post::find($id);
        return view('user.posts.edit', ['post' => $post]);
    }
    public function update(Request $request, $id){
        $post= Post::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('uploads/postImage' , 'public');
            $post->image = $image;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('profile');
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('profile')->with('error' , 'delete post successfully');
    }
}
