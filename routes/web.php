<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});



Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'name' => "Ridho Ray",
        'email' => 'RIdhoray033@gmail.com',
        'img' => 'ridho.png'
    ]);
});






Route::get('/blog', [PostController::class, 'index']);


// Kalau walcard nya hanya {post} -> dia akan mencari id
Route::get('/post/{post:slug}', [PostController::class, 'show']

// cari slug yang slug nya samaa dengan parameter
// return view('post', [
//     'title' => 'single post',
//     'post' => Post::find($slug)
// ]);
);

//
// nexttt

Route::get('/categories', function(){
return view('categories', [
   'title' => 'Post Categories',
   'categories' => Category::all()
]);
});


Route::get('/categories/{category:slug}', function(Category $category){
 return view('posts', [
    'title' => "Posts By :". $category->name,
    'posts' => $category->posts,

 ]);
});

Route::get('/author/{author:username}', function(User $author){
    return view('posts', [
        'title' =>'Post By Author : ' . $author->name,
        'posts' => $author->post->load('category', 'author'),
     ]);
});
