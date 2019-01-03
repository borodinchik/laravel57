<?php

namespace App\Http\Controllers\API;

use App\Services\{FileService, ProductService};
use Illuminate\Http\Request;
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
     * @param Request $request
     * @param int $productId
     * @param int $imageId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateImage(Request $request, int $productId, int $imageId)
    {
        return $this->file->updateImages($request, $data = ['productId' => $productId, 'imageId' => $imageId]);
    }
}
