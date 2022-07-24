<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'school_id',
        'grade_id',
        'roll'
    ];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * @return BelongsTo
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * @return BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * @return HasMany
     */
    public function educationMaterials(): HasMany
    {
        return $this->hasMany(EducationMaterial::class);
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeStudent($query, $userId) {
        return $query->where('user_id', $userId);
    }
}
