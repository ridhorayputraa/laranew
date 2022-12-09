<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // property untuk eager loading
    protected $with = ['category', 'author'];


    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? : false){
        //     $query->where('title', 'like', '%' .  $filters['search'] . '%')
        //     // chaining
        //     ->orWhere('body', 'like', '%' .  $filters['search'] . '%');
        // }

        $query->when($filters['search'] ??  false, function($query, $search){
            return    $query->where('title', 'like', '%' .  $search . '%')
            // chaining
            ->orWhere('body', 'like', '%' .  $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
           return $query->whereHas('category', function($query) use ($category){
               $query->where('slug', $category);
           });
        });

         $query->when($filters['author'] ?? false, fn($query, $author) =>
           $query->whereHas('author', fn($query) =>
            $query->where('username', $author)
              )
        );

    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
