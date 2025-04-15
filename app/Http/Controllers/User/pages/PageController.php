<?php

namespace App\Http\Controllers\User\pages;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        return view('user.pages.home');
    }
    public function about(){
        return view('user.pages.about');
    }
    public function contact(){
        return view('user.pages.contact');
    }
    public function messages(Request $request){
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string', 'email','max:255'],
            'body' => ['required','string','min:10'],
            'user_id' => ['integer']
        ]);
        if(Auth::id()){
            $message = new Message();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->body = $request->body;
            $message->user_id = Auth::user()->id;
            $message->save();
            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        }else{
            return redirect()->route('contact')->with('error', 'You must be logged in to send a message!');
        }
        
    }
    public function blog(){
        $posts = Post::where('status', 'active')->get();
        return view('user.pages.blog' , ['posts' => $posts]);
    }
    public function services(){
        return view('user.pages.services');
    }
    public function single_post($id){
        $post = Post::find($id);
        $comments = Comment::all();
        return view('user.pages.post-details' , ['post' => $post , 'comments' => $comments]);
    }
    public function store(Request $request , $id){
        $request->validate([
            'comment_text' => ['required','string','min:10'],
            'name' => ['string'],
            'user_id' => ['integer']
        ]);
        $post = Post::find($id);
        if(Auth::id()){
            $comment = new Comment();
            $comment->comment_text= $request->comment_text;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->post_id =$post->id;
            $comment->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('error', 'You must be logged in to comment!');
        }
    }
}
