<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function districts() : HasMany {
        return $this->hasMany(District::class);
    }

    /**
     * @return HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }
}
