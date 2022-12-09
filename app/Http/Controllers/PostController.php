<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){


    return view('posts', [
        'active' => 'posts',
        'title' => 'All Posts',


        // filter() dapeti dari model post hasil dari scopeFilter
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get()
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

