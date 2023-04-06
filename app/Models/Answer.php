<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'name', 'email', 'mesagges',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
