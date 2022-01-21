<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CongressController extends Controller
{
    public function index()
    {
        return view('congress.index');
    }

    public function programme()
    {
        return view('congress.programme');
    }

    public function speakers()
    {
        return view('congress.speakers');
    }
}
