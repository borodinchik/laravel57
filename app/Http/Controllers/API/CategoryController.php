<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\Category as CategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryService $service)
    {
        $this->category = $service;
//        $this->middleware('admin', ['only' => ['store', 'update', 'destroy']]);
    }

    /**
     * @param bool $slug
     * @return JsonResponse
     */
    public function index($slug = false) : JsonResponse
    {
        return $this->category->getCategory($slug);
    }

    /**
     * @param int $id
     * @param bool $slug
     * @return JsonResponse
     */
    public function show(int $id, $slug = false) : JsonResponse
    {
        return $this->category->getCategoryById($id, $slug);
    }

    /**
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request) : JsonResponse
    {
        return $this->category->createNewCategory($request);
    }

    /**
     * @param CategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, int $id) : JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(
            [
                'message' => 'Category Updated!'
            ], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id) : JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null,  Response::HTTP_NO_CONTENT);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getCategoryWithProducts(int $id)
    {
        return $this->category->relationshipWith($id);
    }

    public function getCategoryWithProductsAndVarSpec(int $id)
    {
        return $this->category->getManyRelationshipById($id);
    }
}
