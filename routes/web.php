<?php

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


// Data dummy
$blog_posts = [
    [
    'title' => 'Judul Post Pertama',
    'slug' => 'judul-post-pertama',
    'author' =>'Ridho Ray',
    'body' => 'Lorem
     ipsum dolor sit amet consectetur
     adipisicing elit. Magnam esse quaerat dignissimos unde accusamus at maxime soluta consectetur tenetur temporibus pariatur dolores cum nemo asperiores est quam, voluptatibus odit veniam nulla laboriosam voluptate aliquam eligendi! Reiciendis, a culpa nisi non voluptate veritatis repudiandae provident laudantium mollitia ab, consectetur voluptatem dicta perferendis ea. Id dolore quaerat quod ea perspiciatis accusamus, sapiente totam unde corporis excepturi doloribus amet labore repudiandae nisi numquam sint consectetur impedit rem perferendis
     quae! Hic itaque molestias fugiat?
    '
    ],

    [
        'title' => 'Judul Post Kedua',
        'slug' => 'judul-post-kedua',
        'author' =>'Nelaaaa',
        'body' => 'Lorem
         ipsum dolor sit amet consectetur
         adipisicing elit. Magnam esse quaerat dignissimos unde accusamus at maxime soluta consectetur tenetur temporibus pariatur dolores cum nemo asperiores est quam, voluptatibus odit veniam nulla laboriosam voluptate aliquam eligendi! Reiciendis, a culpa nisi non voluptate veritatis repudiandae provident laudantium mollitia ab, consectetur voluptatem dicta perferendis ea. Id dolore quaerat quod ea perspiciatis accusamus, sapiente totam unde corporis excepturi doloribus amet labore repudiandae nisi numquam sint consectetur impedit rem perferendis
         quae! Hic itaque molestias fugiat?
        '
        ]

];

    return view('posts', [
        'title' => 'Posts',
        'posts' => $blog_posts
    ]);
});


Route::get('/post/{slug}', function($slug){


// Data dummy
$blog_posts = [
    [
    'title' => 'Judul Post Pertama',
    'slug' => 'judul-post-pertama',
    'author' =>'Ridho Ray',
    'body' => 'Lorem
     ipsum dolor sit amet consectetur
     adipisicing elit. Magnam esse quaerat dignissimos unde accusamus at maxime soluta consectetur tenetur temporibus pariatur dolores cum nemo asperiores est quam, voluptatibus odit veniam nulla laboriosam voluptate aliquam eligendi! Reiciendis, a culpa nisi non voluptate veritatis repudiandae provident laudantium mollitia ab, consectetur voluptatem dicta perferendis ea. Id dolore quaerat quod ea perspiciatis accusamus, sapiente totam unde corporis excepturi doloribus amet labore repudiandae nisi numquam sint consectetur impedit rem perferendis
     quae! Hic itaque molestias fugiat?
    '
    ],

    [
        'title' => 'Judul Post Kedua',
        'slug' => 'judul-post-kedua',
        'author' =>'Nelaaaa',
        'body' => 'Lorem
         ipsum dolor sit amet consectetur
         adipisicing elit. Magnam esse quaerat dignissimos unde accusamus at maxime soluta consectetur tenetur temporibus pariatur dolores cum nemo asperiores est quam, voluptatibus odit veniam nulla laboriosam voluptate aliquam eligendi! Reiciendis, a culpa nisi non voluptate veritatis repudiandae provident laudantium mollitia ab, consectetur voluptatem dicta perferendis ea. Id dolore quaerat quod ea perspiciatis accusamus, sapiente totam unde corporis excepturi doloribus amet labore repudiandae nisi numquam sint consectetur impedit rem perferendis
         quae! Hic itaque molestias fugiat?
        '
        ]

];

// cari slug yang slug nya samaa dengan parameter
$new_post = [];

// filter slug
foreach ($blog_posts as $post ) {
   if($post['slug'] === $slug){
    $new_post = $post;
   }
}





return view('post', [
    'title' => 'single post',
    'post' => $new_post
]);
});
