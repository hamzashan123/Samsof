<?php

namespace App\Presenters;

trait OpinionPresenter
{
    public function getPresentableContentAttribute()
    {
        return (new \Parsedown())->parse($this->content);
    }
}
