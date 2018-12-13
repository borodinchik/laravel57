<?php

namespace App\Services;

use App\Services\Interfaces\IFile;

class FileService implements IFile
{
    /**
     * @param $request
     * @return array
     */
    public function getFileName($request) : array
    {
        $productImages = [];
        $images = $request->file("image");
        foreach ($images as $key => $image) {
            $fileName = time() . '_' . "{$request->name}" . '_'.  $image->getClientOriginalName();
            $image->move(storage_path() . '/uploads_product/' . "{$request->name}", $fileName);
            array_push($productImages, $fileName);
        }
        return $productImages;
    }
}