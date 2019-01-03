<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ProductImageUpdateRequest as UProductImage;
use App\Services\{FileService, ProductService};
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    protected $file;
    protected $product;

    public function __construct(FileService $fileService, ProductService $service)
    {
        $this->file = $fileService;
        $this->product = $service;
    }

    /**
     * @param UProductImage $request
     * @param int $productId
     * @param int $imageId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateImage(UProductImage $request, int $productId, int $imageId)
    {
        return $this->file->updateImages($request, $data = ['productId' => $productId, 'imageId' => $imageId]);
    }
}
