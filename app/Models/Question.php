<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'name', 'email', 'mesagges',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'name', 'email');
    }
    public function user(){
        return $this->hasMany(User::class, 'user_id', 'name', 'email');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
