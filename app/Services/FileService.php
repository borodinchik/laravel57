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
     * @param $slug
     * @return array
     */
    public function getFileName($request, $slug) : array
    {
        $productImages = [];
        $images = $request->file("image");
            foreach ($images as $image) {
                $fileName = time() . '_' . '_' . $image->getClientOriginalName();
                $image->move(storage_path() . '/uploads_product/' . $slug, $fileName);
                array_push($productImages, $fileName);
            }
        return $productImages;
    }

    /**
     * @param $request
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateImages($request, array $data)
    {
       $result = ProductImage::getProductImageById($data['imageId'], $data['productId']);
       $product = Product::where('id', $data['productId'])->first();
       $fileName = $this->getFileName($request, $product->slug);
       $result->image = $fileName[0];
       $result->update();

       return response()->json(['message' => 'Image Updated'], Response::HTTP_CREATED);
    }
}