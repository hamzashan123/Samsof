<?php

namespace App\Presenters;

trait EventPresenter
{
    public function getPresentableEventDatesAttribute(): string
    {
        if (!$this->id) {
            return '';
        }
        if ($this->starts_at->eq($this->ends_at)) {
            $this->ends_at->format('d M Y');
        }

        if ($this->starts_at->year === $this->ends_at->year && $this->starts_at->month === $this->ends_at->month) {
            return $this->starts_at->format('d') . '-' . $this->ends_at->format('d M Y');
        }

        return $this->starts_at->format('d M Y') . '-' . $this->ends_at->format('d M Y');
    }

    public function getPresentableDescriptionAttribute(): string
    {
        if (!$this->id) {
            return '';
        }
        return nl2br($this->description);
    }
}
