<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    function create(Request $request)
    {
        Post::create($request->all());
        return redirect("/");
    }
    function createPage()
    {
        return view("posts.create");
    }
    function all(){
        $posts = Post::all();
        return view('posts.all', ['posts' => $posts]);
    }
}
