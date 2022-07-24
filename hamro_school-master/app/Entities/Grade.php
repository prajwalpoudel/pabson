<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * @return HasMany
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);

    }

    /**
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    /**
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
