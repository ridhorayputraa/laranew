<?php

namespace App\Models;


class Post
{



    // use HasFactory;
    private static $blog_posts = [
        [
            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Ridho Ray Putra',
            'body' => '
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa temporibus voluptate odio aliquid quod iste blanditiis unde officia accusantium asperiores obcaecati sed provident harum libero magnam dolor explicabo modi molestias, laudantium cupiditate excepturi quidem ipsa. Accusamus enim aliquam excepturi eum vel, recusandae, quod, rem ratione sapiente voluptate labore reprehenderit dolores.
            '
        ],

        [
            'title' => 'Judul Post Kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Nelaaaa',
            'body' => '
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa temporibus voluptate odio aliquid quod iste blanditiis unde officia accusantium asperiores obcaecati sed provident harum libero magnam dolor explicabo modi molestias, laudantium cupiditate excepturi quidem ipsa. Accusamus enim aliquam excepturi eum vel, recusandae, quod, rem ratione sapiente voluptate labore reprehenderit dolores.
            '
        ]

        ];


        public static function all(){
               return self::$blog_posts;
        }

        public static function find($slug){
            $posts = self::$blog_posts;

            $post = [];
// filter slug
        foreach ($posts as $p ) {
        if($p['slug'] === $slug){
            $post = $p;
        }
        }

        return $post;
                }

}
