<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\ProcedurePresenter;
use App\Services\SlugService;

class Procedure extends Model
{
    use SoftDeletes, ProcedurePresenter, Searchable;

    protected $guarded = [];

    protected $appends = [
        'presentable_content',
        'pdf_download',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Procedure $procedure) {
            $procedure->slug = $procedure->slug ?: (new SlugService())->uniqueSlug($procedure);
        });
    }

    public function getPdfDownloadAttribute()
    {
        return route('home') . '/pdfs/procedures/' . $this->slug . '.pdf';
    }
}
