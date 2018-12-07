<?php

namespace App\Http\Controllers\API;

//use App\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Requests\Category as CategoryRequest;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryService $service)
    {
        $this->category = $service;
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
     * @param $id
     * @param bool $slug
     * @return mixed
     */
    public function show($id, $slug = false)
    {
        return $this->category->getCategoryById($id, $slug);
    }

    /**
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        return $this->category->createNewCategory($request);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json(
            [
                'message' => 'Category Updated!'
            ], Response::HTTP_CREATED);
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null,  Response::HTTP_NO_CONTENT);
    }
}
