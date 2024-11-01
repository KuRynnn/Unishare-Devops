<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarirPost extends Model
{
    use HasFactory;
    protected $table = 'karir_posts';
    protected $primaryKey = 'karir_post_id';

    protected $fillable = [
        'title',
        'author',
        'kategori',
        'tema',
        'content',
        'url_event',
        'guidebook',
        'banner_img',
        'admin_id',
    ];
    // TO DO : ADMIN 
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

