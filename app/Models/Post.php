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

    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
