<?php

namespace App;

use App\Services\SlugService;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    protected $appends = [
        'url',
        'thumbnail',
        'copy_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Image $image) {
            $image->slug = $image->slug ?: (new SlugService())->uniqueSlug($image);
        });
    }

    public function getUrlAttribute()
    {
        return url('/images/image/' . $this->slug . '.jpg');
    }

    public function getThumbnailAttribute()
    {
        return url('/images/image/' . $this->slug . '.jpg?custom=800,800');
    }

    public function getCopyUrlAttribute()
    {
        return '![' . $this->title . '](/images/image/' . $this->slug . '.jpg)';
    }
}
