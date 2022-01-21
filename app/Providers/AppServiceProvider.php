<?php

namespace App\Providers;

use App\Member;
use App\Observers\MemberObserver;
use Illuminate\Support\ServiceProvider;
use App\Transformers\MyTransformer;
use App\Validators\ReCaptchaValidator;
use App\View\Composers\CookieComposer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use TPG\ImageRenderer\Facades\ImageRenderer;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        ImageRenderer::addTransformer(
            'custom',
            MyTransformer::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //URL::forceScheme('https');
        Validator::extend('recaptcha', ReCaptchaValidator::class . '@validate');
        View::composer('*', CookieComposer::class);
        Member::observe(MemberObserver::class);
    }
}
