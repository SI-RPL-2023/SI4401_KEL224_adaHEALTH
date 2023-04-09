<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'apotek';

    protected $fillable = [
        'name', 'address', 'phone_number', 'description', 'images',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
    
    public function ratings()
    {
        return $this->hasMany(ApotekRating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}