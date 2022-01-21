<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;

class ReleaseController extends Controller
{
    public function show(Release $release)
    {
        $data = $release;

        return view('posts.show', [
            'data' => $data
        ]);
    }
}
