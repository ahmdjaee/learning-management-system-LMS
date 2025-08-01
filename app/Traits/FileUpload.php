<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload {
    public function uploadFile(UploadedFile $file, string $directory = "uploads", ): string {
        $fileName = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        $file->move(public_path($directory ), $fileName);

        return '/'. $directory . '/'. $fileName;
    }
}

