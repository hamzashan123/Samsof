<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;

class OpinionController extends Controller
{
    public function show(Opinion $opinion)
    {
        $data = $opinion;

        return view('posts.show', [
            'data' => $data
        ]);
    }
}
