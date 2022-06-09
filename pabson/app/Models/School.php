<?php

namespace App\Models;

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
     * Get the school's blog.
     *
     * @return MorphMany
     */
    public function blogs(): MorphMany
    {
        return $this->morphMany(Blog::class, 'bloggable');
    }

    public function getAddressAttribute()
    {
        return $this->municipality->name . '-' . $this->ward_number . ', ' . $this->district->name . ', ' . $this->province->name;
    }
}
