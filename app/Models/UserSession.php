<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;

    protected static $unguarded = true;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
