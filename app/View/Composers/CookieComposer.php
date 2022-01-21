<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class CookieComposer
{
    public function compose(View $view)
    {
        $cookie = Cookie::get('cookie-policy');
        $view->with('cookiePolicy', $cookie ?: false);
    }
}