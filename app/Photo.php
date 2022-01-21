<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\SlugService;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $appends = [
        'image_url',
        'share_url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Photo $photo) {
            $photo->slug = $photo->slug ?: (new SlugService())->uniqueSlug($photo);
        });
    }

    public function getImageUrlAttribute()
    {
        return url('/images/photos/' . $this->id . '.jpg');
    }

    public function getThumbnailAttribute()
    {
        return url('/images/photos/' . $this->id . '.jpg?custom=800,800');
    }

    public function getShareUrlAttribute()
    {
        return url('/images/photos/' . $this->id . '.jpg');
    }
}
