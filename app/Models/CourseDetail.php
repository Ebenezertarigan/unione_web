<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseDetail extends Model
{
    use HasFactory;

    /**
     * 
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'is_enrolled',
        'is_completed'
    ];

    /**
     *
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_enrolled' => 'boolean',
        'is_completed' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id'); // Changed from 'id' to 'course_id'
    }
}
