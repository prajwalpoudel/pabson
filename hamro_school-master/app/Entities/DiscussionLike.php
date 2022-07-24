<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DiscussionLike extends Model
{
    protected $guarded = ['id'];

    /**
     * @param $query
     * @param $discussionId
     * @param $ownerId
     * @return mixed
     */
    public function scopeOwnerLike($query, $discussionId, $ownerId) {
        return $query->where('discussion_id', $discussionId)->where('user_id', $ownerId);
    }
}
