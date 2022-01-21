<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function temp(Request $request)
    {
        $file = $request->file('file');

        $ext = $file->getClientOriginalExtension();

        $temp = Str::random();

        $file->move(storage_path('app/images/temp'), $temp);

        return response()->json([
            'temp' => $temp,
            'ext' => $ext,
        ]);
    }
}
