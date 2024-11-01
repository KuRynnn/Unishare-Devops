<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'post_id';

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
