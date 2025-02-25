<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'email',
        'check_in',
        'check_out',
        'jumlah_tamu',
        'catatan',
        'status'
    ];
}
