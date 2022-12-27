<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
        'active' => 'home',
        'title' => 'Home'
    ]);
});



Route::get('/about', function () {
    return view('about',[
        'active' => 'about',
        'title' => 'About',
        'name' => "Ridho Ray",
        'email' => 'RIdhoray033@gmail.com',
        'img' => 'ridho.png'
    ]);
});






Route::get('/posts', [PostController::class, 'index']);


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
    'active' => 'categories',
   'title' => 'Categories',
   'categories' => Category::all()
]);
});




// redesign ui




// Routes Login

// name method => routes default apa bila ada routes yang ter auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// logoutHandler
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// ROutes after login
Route::get('/dashboard', function(){
   return view('dashboard.index');
} )->middleware('auth');


// Untuk fetch Slug
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

// Routes Resource for CRUD
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class);
