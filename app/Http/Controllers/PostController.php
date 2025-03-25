<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Mail\PostCreatedMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(StoreRequest $request){
        
        $post = Post::create($request->all());

        Mail::to('admin@gmail.com')->send(new PostCreatedMail($post));

        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request){

        $request->validate([
            'title' => 'min:5|max:255|required',
            'slug' => "required|unique:posts,slug,{$post->id}",
            'category' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->all());

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post){
        
        $post->delete();

        return redirect()->route('posts.index');
    }
}
