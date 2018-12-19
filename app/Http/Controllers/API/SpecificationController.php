<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Specification as SpecificationRequest;
use App\Services\SpecificationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SpecificationController extends Controller
{
    protected $specification;

    public function __construct(SpecificationService $service)
    {
        $this->specification = $service;
        $this->middleware('auth:api', ['store', 'update', 'destroy']);
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this->specification->getCollection();
    }

    /**
     * @param SpecificationRequest $request
     * @return JsonResponse
     */
    public function store(SpecificationRequest $request) : JsonResponse
    {
        return $this->specification->saveNewObj($request);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id) : JsonResponse
    {
        return $this->specification->getObjById($id);
    }

    /**
     * @param SpecificationRequest $request
     * @return JsonResponse
     */
    public function update(SpecificationRequest $request) : JsonResponse
    {
        return $this->specification->updateObj($request);
    }

    public function destroy(int $id)
    {
        return $this->specification->deleteObj($id);
    }
}
