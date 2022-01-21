<?php

namespace App\Presenters;

use League\CommonMark\CommonMarkConverter;

trait ReleasePresenter
{
    public function getPresentablePublishedDateAttribute(): ?string
    {
        return $this->published_at ? $this->published_at->format('d M Y') : null;
    }

    public function getPresentableContentAttribute(): string
    {
        return (new CommonMarkConverter())->convertToHtml($this->content);
    }
}
