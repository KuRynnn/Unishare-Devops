<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBeasiswa extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'pendaftaran_beasiswa';

    // Tambahkan kolom-kolom yang boleh diisi secara massal
    protected $fillable = ['name', 'email', 'phone', 'reason'];
}
