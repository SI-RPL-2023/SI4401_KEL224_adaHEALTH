<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals';

    protected $fillable = [
        'name', 'address', 'phone_number', 'description', 'images', 'user_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ratings()
    {
        return $this->hasMany(HospitalRating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

}
