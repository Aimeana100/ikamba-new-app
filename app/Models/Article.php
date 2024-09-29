<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'headlines',
        'image',
        'description',
        'user_id',
        'category_id',
        'published_at',
        'archive',
        'reviewer_id',
        'slug',
        'views',
        'likes',
        'is_home',
        'priority',
        'caption'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
