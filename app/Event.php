<?php

namespace App;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use App\Presenters\EventPresenter;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use EventPresenter, Searchable;

    protected $guarded = [];

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    protected $appends = [
        'start_date',
        'end_date',
        'edit_link',
        'presentable_event_dates',
        'image_url',
        'excerpt',
        'presentable_description',
    ];

    public function getStartDateAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return $this->starts_at ? $this->starts_at->format('Y-m-d H:i') : null;
    }

    public function getEndDateAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return $this->ends_at ? $this->ends_at->format('Y-m-d H:i') : null;
    }

    public function getEditLinkAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('admin.events.edit', [$this->id]);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return url('/images/events/' . $this->id . '.png');
    }

    public function getThumbnailAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return url('/images/events/' . $this->id . '.png?width=100');
    }

    public function getExcerptAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return Str::limit($this->description, 120);
    }
}
