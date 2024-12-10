<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'title',
        'category',
        'description',
        'content',
        'release_date',
        'cover',
        'cover_description'
    ];
}
