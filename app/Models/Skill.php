<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $fillable = [
        'profile_id',
        'name',
        'proficiency_level',
        'years_of_experience'
    ];

    protected $casts = [
        'years_of_experience' => 'integer'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}