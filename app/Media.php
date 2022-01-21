<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $guarded = [];

    protected $dates = [
        'published_at',
    ];

    public function getPublishedDateAttribute()
    {
        return $this->published_at->format('Y-m-d H:i:s');
    }

    public function getImageUrlAttribute()
    {
        return url('/images/media/' . $this->id . '/media.jpg');
    }

    public function getThumbnailAttribute()
    {
        return url('/images/media/' . $this->id . '/media.jpg?width=100');
    }

    public function getPdfFilePathAttribute()
    {
        return storage_path('app/images/media/' . $this->id . '/document.pdf');
    }

    public function getPdfFileUrlAttribute()
    {
        return url('images/media/' . $this->id . '/document.pdf');
    }

    public function getHasPdfFileAttribute()
    {
        return file_exists($this->pdf_file_path);
    }
}
