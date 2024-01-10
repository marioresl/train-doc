<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected static $unguarded = true;

    protected $casts = [
        'birthday' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
