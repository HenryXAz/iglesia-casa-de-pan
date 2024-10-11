<?php

namespace App\Services\Common;


use Illuminate\Http\UploadedFile;

class UploadImageService
{

    public static function upload(string $fileName, string $path, UploadedFile $file ) : void
    {
        $file->move($path, $fileName);
    }

    public static function delete(string $fileName) : bool
    {
        return unlink($fileName);
    }

}
