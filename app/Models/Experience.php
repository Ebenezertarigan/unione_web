<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'position',
        'company_name',
        'start_date',
        'end_date',
        'description',
        'profile_id'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}