<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sessions(){
        return $this->hasMany(UserSession::class);
    }

    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getAvailableSessionsAttribute()
    {
        $sessions = $this->sessions; // Holt alle Sessions des Users

        $availableSessions = 0;

        foreach ($sessions as $session) {
            if ($session->type == 'receive') {
                $availableSessions += 1;
            } elseif ($session->type == 'claim') {
                $availableSessions -= 1;
            }
        }

        return $availableSessions;
    }
}
