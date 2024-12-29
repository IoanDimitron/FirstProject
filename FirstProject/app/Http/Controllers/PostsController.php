<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    function create(Request $request)
    {
        Post::create($request->all());
        return redirect("/posts");
    }
    function createPage()
    {
        return view("posts.create");
    }
    function all(){
        $posts = Post::all();
        return view('posts.all', ['posts' => $posts]);
    }
    function editPage($id)
    {
        $post = Post::firstWhere("id", $id);
        return view("posts.edit", ['post' => $post]);
    }
    function edit(Request $request, $id)
    {
        $data=$request->all();
        $post = Post::firstWhere("id", operator:$id);
        $post->title= $data['title'];
        $post->desc= $data['desc'];
        $post->imgUrl= $data['imgUrl'];
        $post->update();
        return redirect("/posts");
    }
    function delete($id){
        $post = Post::firstWhere("id", $id);
        $post->delete();
        return redirect("/posts");

    }
}
