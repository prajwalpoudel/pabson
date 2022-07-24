<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasOne
     */
    public function school(): HasOne
    {
        return $this->hasOne(School::class);
    }

    /**
     * @return HasOne
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    /**
     * @return HasOne
     */
    public function principal(): HasOne
    {
        return $this->hasOne(Principal::class);
    }

    /**
     * @return HasOne
     */
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    /**
     * @return HasOne
     */
    public function moderator(): HasOne
    {
        return $this->hasOne(Moderator::class);
    }

    /**
     * @return HasOne
     */
    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);

    }

    /**
     * @return HasMany
     */
    public function setting(): HasOne
    {
        return $this->hasOne(Setting::class);
    }

    /**
     * return full name of user.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }
}
