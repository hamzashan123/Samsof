<?php

namespace App\Services;

use App\Member;
use Illuminate\Support\Facades\Storage;

class MemberPdfUploadService
{
    public function updatePdf(string $tempFilename, string $newFolder)
    {
        $file = storage_path('app/images/temp/' . $tempFilename);
        rename($file, $newFolder);
    }
}