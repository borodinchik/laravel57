<?php

namespace App\Services;

use App\Letters;
use App\Services\Interfaces\IFile;

class FileService implements IFile
{
    use Letters;
    /**
     * @param $request
     * @param null $slug
     * @return array
     */
    public function getFileName($request, $slug = null) : array
    {
        $productImages = [];
        $images = $request->file("image");
        foreach ($images as $key => $image) {
            $fileName = time() . '_' . "{$slug}" . '_'.  $image->getClientOriginalName();
            $image->move(storage_path() . '/uploads_product/' . "{$slug}", $fileName);
            array_push($productImages, $fileName);
        }
        return $productImages;
    }
}