<?php

namespace App\Services;

use App\Letters;
use App\Product;
use App\ProductImage;
use App\Services\Interfaces\IFile;
use Illuminate\Http\Response;

class FileService implements IFile
{
    use Letters;

    /**
     * @param $request
     * @return array
     */
    public function getFileName($request) : array
    {
        $productImages = [];
        $images = $request->file("image");
        if (count($images) > 1) {
            foreach ($images as $image) {
                $fileName = time() . '_' . '_' . $image->getClientOriginalName();
                $image->move(storage_path() . '/uploads_product/' . "File_slug", $fileName);
                array_push($productImages, $fileName);
            }
        } else {
            $image = $images;
            $fileName = time() . '_' . '_' . $image->getClientOriginalName();
            $image->move(storage_path() . '/uploads_product/' . "File_slug", $fileName);
            array_push($productImages, $fileName);
        }
        return $productImages;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateImages(array $data)
    {
       $result = ProductImage::getProductImageById($data['imageId'], $data['productId']);
       $image = (string)$data['image'][0];
       $result->image = $image;
       $result->update();

       return response()->json(['message' => 'Image Updated'], Response::HTTP_CREATED);
    }
}