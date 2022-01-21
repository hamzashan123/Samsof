<?php

namespace App\Presenters;

use App\Services\MoneyService;

trait PaymentPresenter
{
    public function getPresentableCreatedAtAttribute()
    {
        return $this->created_at->format('d F Y H:i');
    }

    public function getPresentableAmountAttribute()
    {
        return (new MoneyService())->format($this->amount);
    }
}
