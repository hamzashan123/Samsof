<?php

namespace App;

use Laravel\Scout\Searchable;
use App\Presenters\OpinionPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Services\SlugService;

class Opinion extends Model
{
    use SoftDeletes, OpinionPresenter, Searchable;

    protected $guarded = [];

    protected $appends = [
        'has_pdf_file',
        'pdf_file_url',
        'pdf_download',
        'show_url',
        'share_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Opinion $opinion) {
            $opinion->slug = $opinion->slug ?: (new SlugService())->uniqueSlug($opinion);
        });
    }

    public function getPdfFilePathAttribute()
    {
        return storage_path('app/images/opinions/' . $this->slug . '.pdf');
    }

    public function getPdfFileUrlAttribute()
    {
        return url('images/opinions/' . $this->slug . '.pdf');
    }

    public function getHasPdfFileAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return file_exists($this->pdf_file_path);
    }

    public function getPdfDownloadAttribute()
    {
        if (!$this->id) {
            return null;
        }
        if (!$this->has_pdf_file) {
            return route('api.pdf.opinion', [$this->id]);
        } else {
            return url('images/opinions/' . $this->slug . '.pdf');
        }
    }

    public function getShowUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('opinion.show', $this);
    }

    public function getShareUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('opinion.show', $this);
    }
}
