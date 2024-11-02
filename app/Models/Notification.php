<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'type',
        'is_global'
    ];

    public function userNotifications()
    {
        return $this->hasMany(UserNotification::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_notifications')
            ->withPivot('read_at')
            ->withTimestamps();
    }
}