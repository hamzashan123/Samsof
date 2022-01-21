<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PdfUploadController
{
    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            abort(422, 'No file attached');
        }

        $file = $request->file('file');
        $filename = Str::random() . '.pdf';
        $file->move(storage_path('/app/images/temp'), $filename);

        return response()->json([
            'temp' => $filename
        ]);
    }
}