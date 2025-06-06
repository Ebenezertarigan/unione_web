<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
        'video',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Add this method to tell Laravel which key to use for route model binding
    public function getRouteKeyName()
    {
        return 'course_id';
    }

    public function details(): HasMany
    {
        return $this->hasMany(CourseDetail::class, 'course_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
