<?php

namespace App\Presenters;

trait MediaPresenter
{
    public function getPresentablePublishedDateAttribute()
    {
        return $this->published_at->format('d M Y');
    }
}
