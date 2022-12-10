<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //
    public function index(){

        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }


        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = 'in ' . $author->name;
        }

    return view('posts', [
        'active' => 'posts',
        'title' => 'All Posts' . $title,


        // filter() dapeti dari model post hasil dari scopeFilter
        'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->
        // Untuk klao kita di categories paginate nya akan tetap jalan
        withQueryString()
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

