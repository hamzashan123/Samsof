<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\SlugService;

class Document extends Model
{
    use SoftDeletes, Searchable;

    protected $guarded = [];

    protected $appends = [
        'has_pdf_file',
        'pdf_file_url',
        'share_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Document $document) {
            $document->slug = $document->slug ?: (new SlugService())->uniqueSlug($document);
        });
    }

    public function getPdfFilePathAttribute()
    {
        return storage_path('app/images/documents/' . $this->slug . '.pdf');
    }

    public function getPdfFileUrlAttribute()
    {
        return url('images/documents/' . $this->slug . '.pdf');
    }

    public function getHasPdfFileAttribute()
    {
        return file_exists($this->pdf_file_path);
    }

    public function getShareUrlAttribute()
    {
        return url('images/documents/' . $this->slug . '.pdf');
    }
}
