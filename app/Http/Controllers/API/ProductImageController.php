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

    public function updateImage(Request $request, int $productId, int $imageId)
    {
        $img =  $this->file->getFileName($request);
        $data = ['image' => $img, 'productId' => $productId, 'imageId' => $imageId];
        return $this->file->updateImages($data);
    }
}
