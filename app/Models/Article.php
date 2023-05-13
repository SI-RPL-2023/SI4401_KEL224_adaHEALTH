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

        'title_content2',
        'isi_content2',

        'title_content3',
        'isi_content3',

        'title_content4',
        'isi_content4',

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
