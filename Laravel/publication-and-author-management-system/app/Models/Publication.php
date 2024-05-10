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
        'isbn',
        'published_date',
        'cover_picture',
    ];
}
