<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        // 'email', 'password', 'full_name', 'phone', 'date_of_birth', 'gender', 'role',
        'email', 'password', 'full_name', 'phone', 'date_of_birth', 'gender', 'role', 'status', 'remember_token', 'image', 'verification_code', 'sent_at', 'is_verified'
    ];

    protected $hidden = [
        'password',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function companies()
    {
        return $this->hasOne(Company::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
