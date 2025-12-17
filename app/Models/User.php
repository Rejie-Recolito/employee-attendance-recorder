<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    /** @var list<string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'phone_number',
        'profile_photo',
        'user_type',
        'date_of_birth',
        'place_of_birth',
        'age',
        'sex',
        'address',
        'job_title',
        'department',
        'status',
        'date_of_service',
        'salary',
    ];

    /** @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
