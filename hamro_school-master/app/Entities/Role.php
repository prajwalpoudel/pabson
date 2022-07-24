<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    protected $fillable = ['name', 'display_name'];

    /**
     * Has many users
     *
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
