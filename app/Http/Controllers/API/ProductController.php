<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\FileService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Product as ProductRequest;
use Illuminate\Http\Request;

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

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request) : JsonResponse
    {
        $img = $this->file->getFileName($request);
        $data = ['image' => $img, 'request' => $request];
        return $this->product->saveNewObj($data);

    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return $this->product->getObjById($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id) : JsonResponse
    {
        $img = $this->file->getFileName($request);
        $data = ['image' => $img, 'request' => $request, 'id' => $id];
        return $this->product->updateObj($data);
    }

    public function destroy(int $id)
    {
        return $this->product->deleteObj($id);
    }
}
