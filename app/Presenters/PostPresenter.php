<?php

namespace App\Presenters;

trait PostPresenter
{
    public function getPresentablePublishedDateAttribute()
    {
        return $this->published_at->format('d M Y');
    }
}
