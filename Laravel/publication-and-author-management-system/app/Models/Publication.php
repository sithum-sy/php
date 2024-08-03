<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class publication extends Model
{
    use HasFactory, Rateable;

    protected $fillable = [
        'pub_name',
        'author_id',
        'category_id',
        'isbn',
        'published_date',
        'cover_picture',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'publication_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'publication_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function ratingCount()
    {
        return $this->ratings()->count();
    }
}
