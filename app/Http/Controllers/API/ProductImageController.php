<?php

namespace App\Http\Controllers\API;

use App\Services\FileService;
use App\Services\ProductService;
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

    public function update(Request $request)
    {
        $img =  $this->file->getFileName($request);
        return $this->product->updateObj($img);
    }
}
