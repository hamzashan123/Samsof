<?php

namespace App\Presenters;

use League\CommonMark\CommonMarkConverter;
use Parsedown;

trait ProcedurePresenter
{
    public function getPresentableContentAttribute()
    {
        return $this->content ? (new CommonMarkConverter())->convertToHtml($this->content) : null;
    }
}
