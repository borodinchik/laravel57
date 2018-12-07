<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\FileService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Product as ProductRequest;

class ProductController extends Controller
{
    protected $product;
    protected $file;

    public function __construct(ProductService $service, FileService $fileService)
    {
        $this->product = $service;
        $this->file = $fileService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this->product->getCollection();
    }

    public function store(ProductRequest $request)
    {
        $img = $this->file->getFileName($request);

        return $this->product->saveNewObj($request);

    }
}
