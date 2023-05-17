<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasi';
    protected $fillable = [
        'id_dokter', 
        'id_pasien', 
        'email_pasien', 
        'penyakit', 
        'obat', 
        'saran', 
        'rujukan_rs'
    ];
}
