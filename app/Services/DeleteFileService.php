<?php

namespace App\Services;

class DeleteFileService
{
    public function deleteFile(string $filename)
    {
        if ($this->checkFile($filename)) {
            unlink($filename);
        }
    }

    protected function checkFile(string $filename)
    {
        if (file_exists($filename)) {
            return true;
        }
        return false;
    }
}