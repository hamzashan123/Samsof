<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function __invoke()
    {
        Cookie::queue('cookie-policy', true, 60 * 48);
        return redirect()->back();
    }
}
