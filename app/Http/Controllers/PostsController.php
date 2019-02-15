<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositories\Posts;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __constructor(){
        $this->middleware('auth');
    }
    public function index(Posts $posts){

      

            $posts = $posts->all();

        return view('posts.index',compact('posts','archieves'));
    }

    public function show($id){
        $post= Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create(){
        return view('posts.create');
    }
    
    public function store(){
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);
        
        // create a new post
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();

        $post->save();

        return redirect('/');
    }
}
