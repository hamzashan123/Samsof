<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
