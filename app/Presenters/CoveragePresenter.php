<?php

namespace App\Presenters;

use Illuminate\Support\Str;

trait CoveragePresenter
{
    public function getPresentablePublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d F Y') : null;
    }

    public function getShortenedDescriptionAttribute()
    {
        return Str::limit($this->description, 90);
    }

    public function getPresentableContentAttribute()
    {
        return (new \Parsedown())->parse($this->content);
    }
}
