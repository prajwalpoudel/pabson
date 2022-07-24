<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    public $appends = ['address'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    /**
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);

    }

    /**
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);

    }

    /**
     * @return BelongsTo
     */
    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);

    }

    /**
     * @return HasOne
     */
    public function principal(): HasOne
    {
        return $this->hasOne(Principal::class);

    }

    /**
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    /**
     * @return BelongsToMany
     */
    public function guardians(): BelongsToMany
    {
        return $this->belongsToMany(Guardian::class);
    }

    /**
     * @return HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * @return HasMany
     */
    public function educationMaterials(): HasMany
    {
        return $this->hasMany(EducationMaterial::class);
    }

    /**
     * Get the school's blog.
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

    public function getAddressAttribute()
    {
        return $this->municipality->name . '-' . $this->ward_number . ', ' . $this->district->name . ', ' . $this->province->name;
    }
}
