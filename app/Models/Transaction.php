<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_user',
        'id_obat',
        'id_hospital',
        'id_rating_hospital',
        'id_apotek',
        'id_rating_apotek',
        'type',
        'qty_item',
        'total_harga',
        'metode_payment',
        'status',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}

