<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\PostPresenter;

class Post extends Model
{
    use PostPresenter;

    protected $guarded = [];

    protected $dates = [
        'published_at',
    ];

    protected $appends = [
        'published_date',
        'image_url',
        'has_pdf_file',
        'presentable_published_date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPublishedDateAttribute()
    {
        return $this->published_at->format('Y-m-d H:i:s');
    }

    public function getPdfFilePathAttribute()
    {
        return storage_path('app/images/posts/' . $this->id . '/document.pdf');
    }

    public function getPdfFileUrlAttribute()
    {
        return url('images/posts/' . $this->id . '/document.pdf');
    }

    public function getHasPdfFileAttribute()
    {
        return file_exists($this->pdf_file_path);
    }

    public function getImageUrlAttribute()
    {
        return url('/images/posts/' . $this->id . '/post.jpg');
    }

    public function getThumbnailAttribute()
    {
        return url('/images/posts/' . $this->id . '/post.jpg?width=100');
    }
}
