<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certification extends Model
{
    protected $fillable = [
        'profile_id',
        'name',
        'issuing_organization',
        'issued_date',
        'expiration_date',
        'credential_url',
        'credential_id'
    ];

    protected $casts = [
        'issued_date' => 'date',
        'expiration_date' => 'date'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}