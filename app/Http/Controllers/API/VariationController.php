<?php

namespace App\Http\Controllers\API;

use App\Services\FileService;
use App\Services\VariationService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Variation as VariationRequest;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    protected $variation;
    protected $file;

    public function __construct(FileService $fileService,VariationService $service)
    {
        $this->file = $fileService;
        $this->variation = $service;
        $this->middleware('auth:api', ['store', 'update']);

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this->variation->getCollection();
    }

    /**
     * @param VariationRequest $request
     * @return JsonResponse
     */
    public function store(VariationRequest $request) : JsonResponse
    {
        $img = $this->file->getFileName($request);
        $data = ['image'=> $img, 'request' => $request];
        return $this->variation->saveNewObj($data);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id) : JsonResponse
    {
        return $this->variation->getObjById($id);
    }

    /**
     * @param VariationRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(VariationRequest $request, int $id) : JsonResponse
    {
        $img = $this->file->getFileName($request);
        $data = ['image' => $img, 'request' => $request, 'id' => $id];
        return $this->variation->updateObj($data);
    }
}
