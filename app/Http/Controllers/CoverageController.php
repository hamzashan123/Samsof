<?php

namespace App\Http\Controllers;

use App\Coverage;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    public function show(Coverage $coverage)
    {
        $data = $coverage;

        return view('posts.show', [
            'data' => $data
        ]);
    }
}
