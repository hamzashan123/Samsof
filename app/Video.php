<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\SlugService;
use Illuminate\Support\Facades\File;

class Video extends Model
{
    use SoftDeletes, Searchable;

    protected $guarded = [];

    protected $appends = [
        'share_url',
        'cover_url'
    ];

    public function getShareUrlAttribute()
    {
        return $this->link;
    }

    public function getHasCoverAttribute()
    {
        return storage_path('app/images/videos/' . $this->id . '.jpg');
    }

    public function getCoverUrlAttribute()
    {
        if (File::exists($this->has_cover)) {
            return url('images/videos/' . $this->id . '.jpg');
        }
        return url('images/media/videos.png');
    }
}
