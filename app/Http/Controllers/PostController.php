<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::latest();
        if(request('search')){
            $posts->where('title', 'like', '%' .  request('search') . '%')
            // chaining
            ->orWhere('body', 'like', '%' .  request('search') . '%');
        }

    return view('posts', [
        'active' => 'posts',
        'title' => 'All Posts',

        // Jika TIdak ada pencarian maka masuk kesini

        'posts' => $posts->get()
    ]);
    }


    public function show(Post $post){
    return view('post', [
        'active' => 'posts',
        'title' => 'Single post',
        'post' => $post
    ]);
    }

}

