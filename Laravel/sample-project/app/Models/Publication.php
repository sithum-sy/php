<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'pub_name',
        'category_id',
        'isbn',
        'published_date',
        'cover_picture',
    ];
}
