<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $appends = ['posted_on'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:H:i A, M d, Y',
    ];

    /**
     * @return Carbon
     */
    public function getPostedOnAttribute() {
        return Carbon::parse($this->created_at)->format('H:i A, M d, Y');
    }
}
