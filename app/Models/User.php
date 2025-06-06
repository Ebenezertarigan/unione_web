<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id'; // Changed from 'id' to 'user_id'

    /**
     * 
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto',
    ];

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The default attributes for the user.
     *
     * @var array
     */
    protected $attributes = [
        'role' => 'user'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'user_id', 'user_id');
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_details', 'user_id', 'course_id');
    }
}
