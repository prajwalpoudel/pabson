<?php

namespace App\Entities;

use App\Constants\CommentStatusConstant;
use App\Constants\VisibilityConstant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];
    /**
     * @return HasOne
     */
    public function subject() : HasOne {
        return $this->hasOne(DiscussionSubject::class);
    }
    /**
     * @return HasMany
     */
    public function subjects() : HasMany {
        return $this->hasMany(DiscussionSubject::class);
    }


    /**
     * @return BelongsToMany
     */
    public function discussionSubjects() : BelongsToMany {
        return $this->belongsToMany(Subject::class, 'discussion_subjects');
    }

    /**
     * @return HasMany
     */
    public function likes() : HasMany {
        return $this->hasMany(DiscussionLike::class);
    }

    /**
     * @return HasMany
     */
    public function comments() : HasMany {
        return $this->hasMany(Discussion::class, 'parent_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeParent($query) {
        return $query->where('parent_id', null);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeVisible($query) {
        return $query->where('visibility_status', VisibilityConstant::PUBLIC_ID);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCommentAllowed($query) {
        return $query->where('comment_status', CommentStatusConstant::ACTIVE_ID);
    }
}
