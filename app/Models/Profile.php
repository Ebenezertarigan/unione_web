<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $table = 'customer_profiles';

    protected $fillable = [
        'user_id',
        'headline',
        'about',
        'location',
        'phone_number',
        'birth_date',
        'avatar',
        'cover_photo'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'profile_id');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'profile_id');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'profile_id');
    }

    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class, 'profile_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'profile_id');
    }
}