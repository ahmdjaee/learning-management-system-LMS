<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, string $directory = "uploads", ): string
    {
        try {
            $fileName = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path($directory), $fileName);

            return '/' . $directory . '/' . $fileName;
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            throw $th;
        }
    }

    public function deleteFile(?string $path): bool
    {
        if (File::exists(public_path($path))) {
            return File::delete(public_path($path));
        }

        return false;
    }
}

