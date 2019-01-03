<?php

namespace App\Http\Controllers\API;

use App\Http\{Controllers\Controller,
    Requests\Product as ProductRequest,
    Requests\ProductUpdateRequest as UProductRequest};
use App\Letters;
use App\Services\{FileService, ProductService};
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    use Letters;
    protected $product;
    protected $file;

    public function __construct(ProductService $service, FileService $fileService)
    {
        $this->product = $service;
        $this->file = $fileService;
//        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
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
        $productName = $this->getChangedWords($request->name);
        $slug =  $this->getSlug($productName);
        $img = $this->file->getFileName($request, $slug);
        $data = ['image' => $img, 'request' => $request, 'slug' => $slug];
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
     * @param UProductRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UProductRequest $request, int $id) : JsonResponse
    {
        $productName = $this->getChangedWords($request->name);
        $slug =  $this->getSlug($productName);
        $data = ['request' => $request, 'id' => $id, 'slug' => $slug];
        return $this->product->updateObj($data);
    }

    public function destroy(int $id)
    {
//        return $this->product->deleteObj($id);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getProductWithVariationsWithSpecifications(int $id)
    {
        return $this->product->relationshipWith($id);
    }
}
