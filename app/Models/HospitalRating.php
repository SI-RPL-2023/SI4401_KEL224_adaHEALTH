<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalRating extends Model
{
    protected $fillable = ['rating', 'user_id', 'hospital_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function reviewsCount()
    {
        return $this->where('hospital_id', $this->hospital_id)->count();
    }

}

