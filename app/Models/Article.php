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
        'title_content',
        'isi_content',

        'category',
        'images',
        'author_id',
        'published_date',
        'views',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
