<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'content2',
        'content3',
        'content4',
        'category',
        'images',
        'author_id',
        'published_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
