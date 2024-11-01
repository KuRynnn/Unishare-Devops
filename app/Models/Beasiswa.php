<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $table = 'beasiswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'jenis_beasiswa',
        'due_date_beasiswa',
        'penyelenggara_beasiswa',
        'deskripsi_beasiswa',
        'beasiswa_img',
        'beasiswa_url',
        'created_at',
        'updated_at'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function scopeFilter($query, array $filters){
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('title', 'like', '%' . $filters['search'] . '%');
        }
    }
}
