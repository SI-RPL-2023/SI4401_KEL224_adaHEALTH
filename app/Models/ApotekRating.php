<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApotekRating extends Model
{
    protected $fillable = ['rating', 'user_id', 'apotek_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apotek()
    {
        return $this->belongsTo(Apotek::class);
    }
    public function reviewsCount()
    {
        return $this->where('apotek_id', $this->apotek_id)->count();
    }
}