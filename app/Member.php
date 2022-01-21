<?php

namespace App;

use App\Services\SlugService;
use App\Presenters\MemberPresenter;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Member extends Authenticatable
{
    use Notifiable, MemberPresenter, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'qualifications' => 'json',
        'interests' => 'json',
        'coordinates' => 'json',
        'active' => 'bool',
        'published' => 'bool',
        'approved' => 'bool',
        'pop_apprived' => 'bool',
        'notify_members' => 'bool',
    ];

    protected $dates = [
        'last_login_at',
        'birth',
        'payment_at',
        'expires_at',
    ];

    protected $appends = [
        'name',
        'presentable_payment_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Member $member) {
            $member->coordinates = $member->coordinates ?: [
                'lat' => 0,
                'long' => 0,
            ];

            $member->username = (new SlugService())->uniqueSlug($member, 'name', 'username');
        });
    }


    public function scopeActive(Builder $builder)
    {
        return $builder->where('admin', '!=', true)->where('published', '=', true);
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function logs()
    {
        return $this->morphMany(Log::class, 'loggable');
    }

    public function getLastPaymentAttribute()
    {
        return $this->payments()->orderBy('created_at', 'desc')->first();
    }

    public function getNextPaymentAtAttribute()
    {
        if (!$this->expires_at) {
            if ($this->payment_at) {
                $months = 13 - ($this->payment_at->format('m'));
                return new Carbon('first day of January' . $this->payment_at->addMonths($months)->format('Y'));
            }
            return null;
        }
        return $this->expires_at;
    }

    public function getPaidAttribute()
    {
        return $this->next_payment_at ? now()->lt($this->next_payment_at) : false;
    }

    public function getPayableAttribute()
    {
        return $this->next_payment_at ? now()->gt($this->next_payment_at->subMonths(2)) : true;
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getPopUploadedAtAttribute()
    {
        $path = 'pops/'.$this->id.'.pdf';

        if (!Storage::disk('local')->exists($path) || !Storage::disk('local')->lastModified($path)) {
            return null;
        }

        return Carbon::createFromTimestamp(Storage::disk('local')->lastModified($path));
    }

    public function getHasPopAttribute()
    {
        $path = 'pops/'.$this->id.'.pdf';
        if (!Storage::disk('local')->exists($path)) {
            return false;
        }
        return true;
    }

    public function getHasCertificateAttribute()
    {
        $path = 'certificates/'.$this->id.'.pdf';
        if (!Storage::disk('local')->exists($path)) {
            return false;
        }
        return true;
    }

    public function getHasVoucherAttribute()
    {
        $path = 'vouchers/'.$this->id.'.pdf';
        if (!Storage::disk('local')->exists($path)) {
            return false;
        }
        return true;
    }
}
