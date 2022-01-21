<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use Searchable;
    protected $guarded = [];
}
