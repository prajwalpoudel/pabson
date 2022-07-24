<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Guardian extends Model
{
    use SoftDeletes, Notifiable;

    /**
     * @var array
     */
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
}
