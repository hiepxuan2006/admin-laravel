<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImage
{
    public function starogeUpload($request, $fieldName, $pathFolder)
    {
        if ($request->hasFile($fieldName)) {
            //
            $file = $request->$fieldName;

            $fileName = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $fileName;
            $filePath = Storage::putFileAs($pathFolder, $request->file($fieldName), $fileNameHash);
            $dataUpload = [
                'file_path' => Storage::url($filePath),
                'file_name' => $fileName
            ];
            return $dataUpload;
        }
        return null;
    }
    public function starogeUploadMulti($file, $pathFolder)
    {

        $fileName = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $fileName;
        $filePath = Storage::putFileAs($pathFolder, $file, $fileNameHash);
        $dataUpload = [
            'file_path' => Storage::url($filePath),
            'file_name' => $fileName
        ];
        return $dataUpload;
    }
}
