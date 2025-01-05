<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\UserLike;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    function create(Request $request)
    {
        if($this->isAdmin){
        Post::create($request->all());
        }
    return redirect("/posts");
    }
    function createPage()
    {
        if($this->isAdmin){
        return view("posts.create");
        } else {
        return redirect("/posts");
        }
    }
    function all(){
        $posts = Post::all();
        $likes = UserLike::all();
        $userId = Auth()->user()->id;
        foreach($posts as $post)
        {
            $likesCount = 0;
            $likedByUser = false;
            foreach($likes as $like)
            {
                if($like->post_id == $post->id){
                     $likesCount++;
                    if($like->user_id === $userId)
                    {
                        $likedByUser = true;
                    }
                }
            }
            $post->likes= $likesCount;
            $post->liked= $likedByUser;
        }
        return view('posts.all', ['posts' => $posts, 'isAdmin' => $this->isAdmin]);
    }
    function editPage($id)
    {
        if($this->isAdmin){
        $post = Post::firstWhere("id", $id);
        return view("posts.edit", ['post' => $post]);
        }else return redirect("/posts");
    }
    function edit(Request $request, $id)
    {
        if($this->isAdmin){
        $data=$request->all();
        $post = Post::firstWhere("id", operator:$id);
        $post->title= $data['title'];
        $post->desc= $data['desc'];
        $post->imgUrl= $data['imgUrl'];
        $post->update();
        }
        return redirect("/posts");
    }
    function delete($id){
        if($this->isAdmin){
        $post = Post::firstWhere("id", $id);
        $post->delete();
        }
        return redirect("/posts");

    }
    function like(Request $request){
        UserLike::create($request->all());
        return redirect("/posts");
    }
    function unlike(Request $request){
        $previousUrl = url()->previous();
        $previousPath = parse_url($previousUrl, PHP_URL_PATH);
        $userLike = UserLike::where('user_id',$request->user_id)
        ->where('post_id',$request->post_id)
        ->first();
        $userLike->delete();
        return redirect($previousPath);
    }
    function MyLikedposts(){
        $posts = Post::all();
        $likes = UserLike::all();
        $userId = Auth()->user()->id;
        foreach($posts as $post)
        {
            $likesCount = 0;
            $likedByUser = false;
            foreach($likes as $like)
            {
                if($like->post_id == $post->id){
                     $likesCount++;
                    if($like->user_id === $userId)
                    {
                        $likedByUser = true;
                    }
                }
            }
            $post->likes= $likesCount;
            $post->liked= $likedByUser;
        }
        $posts = $posts->where("liked", true);
        return view('posts.likedPosts', ['posts' => $posts, 'isAdmin' => $this->isAdmin]);
    }
}
