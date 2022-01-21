<?php

namespace App\Http\Controllers;

use App\Mail\ShareMail;
use App\Support\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'email'],
            'link' => 'required',
            'recaptcha' => ['required', 'recaptcha'],
        ]);

        $share = new Share($request);
        Mail::send(new ShareMail($share));

        return redirect()->back()->with('success', 'You have shared this media item succesfully');
    }
}
