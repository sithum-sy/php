<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'pub_name',
        'author',
        'category_id',
        'isbn',
        'published_date',
        'cover_picture',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
