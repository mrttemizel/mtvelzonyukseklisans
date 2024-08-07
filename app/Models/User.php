<?php

namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_SUPER_ADMIN = 'super.admin';

    const ROLE_ADMIN = 'admin';

    const ROLE_USER = 'user';

    protected $guarded = ['id'];

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

    public function isSameRole(string $role): bool
    {
        return $this->role == $role;
    }

    public function isSuperAdmin(): bool
    {
        return $this->role == self::ROLE_SUPER_ADMIN;
    }

    public function isAdmin(): bool
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role == self::ROLE_USER;
    }
}
