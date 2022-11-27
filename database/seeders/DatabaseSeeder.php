<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
     Post::factory(20)->create();
     User::factory(3)->create();

     Category::create([
        'name' => 'Web Programming',
        'slug' => 'web-programming',
        ]);

    Category::create([
        'name' => 'Personal',
        'slug' => 'personal',
         ]);


         Category::create([
            'name' => 'Web Desgin',
            'slug' => 'web-design',
             ]);
    }
}
