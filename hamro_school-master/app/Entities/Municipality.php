<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'district_id'];

    /**
     * @return BelongsTo
     */
    public function district() : BelongsTo {
        return $this->belongsTo(District::class);
    }

    /**
     * @return HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

}
