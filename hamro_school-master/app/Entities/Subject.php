<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Subject extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    /**
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    /**
     * @return BelongsToMany
     */
    public function moderators(): BelongsToMany
    {
        return $this->belongsToMany(Moderator::class);
    }

    /**
     * @return BelongsToMany
     */
    public function discussions(): BelongsToMany {
        return $this->belongsToMany(Discussion::class, 'discussion_subjects');
    }

    public function getImageUrlAttribute(){
        if($this->getFirstMedia("image")!= null){
            return $this->getFirstMediaUrl('image');
        }
        else {
            return asset('images/noimage.png');
        }
    }
}
