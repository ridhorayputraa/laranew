<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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






Route::get('/blog', function () {



    return view('posts', [
        'title' => 'Posts',
        'posts' => Post::all()
    ]);
});


Route::get('/post/{slug}', function($slug){




// cari slug yang slug nya samaa dengan parameter






return view('post', [
    'title' => 'single post',
    'post' => Post::find($slug)
]);
});
