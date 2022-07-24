<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'province_id'];
    /**
     * @return BelongsTo
     */
    public function province() : BelongsTo {
        return $this->belongsTo(Province::class);
    }

    /**
     * @return HasMany
     */
    public function municipalities() : HasMany {
        return $this->hasMany(Municipality::class);
    }

    /**
     * @return HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }
}
