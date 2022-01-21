<?php

namespace App;

use App\Presenters\PaymentPresenter;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use PaymentPresenter;

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
