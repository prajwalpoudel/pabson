<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'subject',
        'email_from',
        'content',
        'created_at',
        'updated_at',
    ];
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
