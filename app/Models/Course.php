<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected static $unguarded = true;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(UserSession::class);
    }
}
