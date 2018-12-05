<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Services\CategoryHelper;
use Illuminate\Http\Request;
use App\Http\Requests\Category as CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @param CategoryHelper $categoryHelper
     * @param bool $slug
     * @return object
     */
    public function index(CategoryHelper $categoryHelper, $slug = false) : object
    {
        return $categoryHelper->getCategory($slug);
    }

    public function show($id, $slug = false, CategoryHelper $categoryHelper)
    {
        return $categoryHelper->getCategoryById($id, $slug);
    }

    /**
     * @param CategoryRequest $request
     * @param CategoryHelper $categoryHelper
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request, CategoryHelper $categoryHelper) : object
    {
        return $categoryHelper->createNewCategory($request);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) : object
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(
            [
                'message' => 'Category Updated!'
            ], Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) : object
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null,  Response::HTTP_NO_CONTENT);
    }
}
