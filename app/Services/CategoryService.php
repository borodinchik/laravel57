<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 11/30/18
 * Time: 11:42 AM
 */

namespace App\Services;


use App\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class  CategoryService
{
    const CATEGORY_LIST = 'list';
    const CATEGORY_TREE = 'tree';

    /**
     * @param $categories
     * @return mixed
     */
    protected function getCategoryAndSubcategoryTree($categories)
    {
        $children = [];

        foreach ($categories as &$category)
            $children[$category['parent_id']][] = &$category;
            unset($category);

        foreach ($categories as &$category)
            if (isset($children[$category['id']]))
                $category['children'] = $children[$category['id']];
                unset($category);
            return $children[null];
    }

    /**
     * @param $slug
     * @return JsonResponse
     */
    public function getCategory($slug) : JsonResponse
    {
        $categories = Category::all();

        if ($slug == self::CATEGORY_TREE) {
            $categoryTree = $this->getCategoryAndSubcategoryTree($categories);
            return response()->json(
                [
                    'categories' => $categoryTree
                ], Response::HTTP_OK);

        } elseif ($slug == self::CATEGORY_LIST) {
            return response()->json(
                [
                    'categories' => $categories
                ], Response::HTTP_OK);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createNewCategory($request) : JsonResponse
    {
        $category = new Category();
        $category->title = $request->title;

        $category->parent_id = ($request->parent_id)
            ? (Category::findOrFail($request->parent_id))->id
            : null;

        $category->save();
        return response()->json(
            [
                'message' => "Category {$category->title} Create Successfully"
            ], Response::HTTP_CREATED);
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryById($id, $slug) : object
    {
        $category = Category::findOrFail($id);
        $categoryAndChildren = Category::with('children')->findOrFail($id);
        $result = ($slug == true) ? $categoryAndChildren : $category;
        return response()->json(['category' => $result], Response::HTTP_OK);
    }
}