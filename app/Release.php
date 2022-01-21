<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\ReleasePresenter;
use Illuminate\Database\Eloquent\SoftDeletes;

class Release extends Model
{
    use SoftDeletes, ReleasePresenter, Searchable;

    protected $guarded = [];

    protected $dates = [
        'published_at',
    ];

    protected $appends = [
        'presentable_published_date',
        'image_url',
        'has_pdf_file',
        'presentable_published_date',
        'pdf_download',
        'show_url',
        'share_url',
        'show_image_url',
    ];

    public function getShowUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('release.show', $this);
    }

    public function getShareUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('release.show', $this);
    }

    public function getPdfFilePathAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return storage_path('app/images/releases/' . $this->id . '/document.pdf');
    }

    public function getPdfFileUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return url('images/releases/' . $this->id . '/document.pdf');
    }

    public function getHasPdfFileAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return file_exists($this->pdf_file_path);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return url('images/releases/' . $this->id . '/cover.jpg');
    }

    public function getShowImageUrlAttribute()
    {
        if (!$this->id) {
            return null;
        }
        if ($this->image_url) {
            return $this->image_url;
        }
        return url('images/content/placeholder.jpg');
    }

    public function getThumbnailAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return url('/images/releases/' . $this->id . '/cover.jpg?width=100');
    }

    public function getPdfDownloadAttribute()
    {
        if (!$this->id) {
            return null;
        }
        return route('api.pdf.release', [$this->id]);
    }
}
