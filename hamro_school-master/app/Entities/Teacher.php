<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Teacher extends Model
{
    use Notifiable, SoftDeletes;


    protected $guarded = [
        'id',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class);

    }

    /**
     * @return BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);

    }

    /**
     * @return BelongsToMany
     */
    public function grades(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class);
    }

    /**
     * Get the teacher's blog.
     *
     * @return MorphMany
     */
    public function blogs(): MorphMany
    {
        return $this->morphMany(Blog::class, 'bloggable');
    }

    /**
     * Get the teacher's education material.
     *
     * @return MorphMany
     */
    public function education_materials(): MorphMany
    {
        return $this->morphMany(EducationMaterial::class, 'materialable');
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeTeacher($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
