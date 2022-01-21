<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\CoveragePresenter;
use Illuminate\Support\Facades\File;

class Coverage extends Model
{
    use SoftDeletes, CoveragePresenter, Searchable;

    protected $guarded = [];

    protected $dates = [
        'published_at',
    ];

    protected $appends = [
        'published_date',
        'image_url',
        'presentable_published_date',
        'share_url',
        'read_url',
        'show_image_url',
    ];

    public function getPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('Y-m-d H:i:s') : null;
    }

    public function getShareUrlAttribute()
    {
        return $this->link;
    }

    public function getImageUrlAttribute()
    {
        return url('/images/coverages/' . $this->id . '/cover.jpg');
    }

    public function getImageFileAttribute()
    {
        return storage_path('app/images/coverages/' . $this->id . '/cover.jpg');
    }

    public function getShowImageUrlAttribute()
    {
        if (File::exists($this->image_file)) {
            return $this->image_url;
        }

        return url('images/content/placeholder.jpg');
    }

    public function getThumbnailAttribute()
    {
        return url('/images/coverages/' . $this->id . '/cover.jpg?width=100');
    }

    public function getReadUrlAttribute()
    {
        if ($this->content === null) {
            return $this->link;
        }
        return route('coverage.show', $this);

    }
}
