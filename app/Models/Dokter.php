<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_dokter',
        'spesialis',
        'email',
        'password',
        'alamat',
        'no_telp',
        'gender',
        'tanggal_lahir',
        'role',
        'foto',
        'jam_buka',
        'jam_tutup'
    ];
}