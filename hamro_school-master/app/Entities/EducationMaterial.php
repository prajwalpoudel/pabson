<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationMaterial extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $appends = ['posted_on'];

    /**
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:H:i A, M d, Y',
    ];

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function materialable()
    {
        return $this->morphTo();
    }

    /**
     * @return Carbon
     */
    public function getPostedOnAttribute()
    {
        return Carbon::parse($this->created_at)->format('H:i A, M d, Y');
    }
}
