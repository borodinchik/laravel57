<?php

namespace App\Services;


use App\Product;
use App\Services\Interfaces\ICrud;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductService implements ICrud
{
    const NORMAL_PRODUCT = 0;
    const PRODUCT_WITH_VARIATIONS = 1;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCollection(): JsonResponse
    {
        $products = Product::all();
        return response()->json(
            [
                'all_products' => $products
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function saveNewObj($data) : JsonResponse
    {

        $product = new Product();
        $product->name = (string)$data['request']->name;
        $product->slug = (string)$data['request']->slug;
        $product->description = (string)$data['request']->description;
        $product->image = (string)$data['image'];
        $product->type = (int)$data['request']->type;
        $product->save();

        return response()->json(
            [
                'data' => "New product {$product->name} Created!"
            ], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getObjById(int $id) : JsonResponse
    {
        $product = Product::findOrFail($id);
        return response()->json(
            [
                "product_({$id})" => $product
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function updateObj($data) : JsonResponse
    {
        $product = Product::findOrFail($data['id']);
        $product->name = (string)$data['request']->name;
        $product->slug = (string)$data['request']->slug;
        $product->description = (string)$data['request']->description;
        $product->image = (string)$data['image'];
        $product->update();

        return response()->json(
            [
                "product_({$data['id']})" => "Product  Updated!"
            ], Response::HTTP_CREATED);
    }

    public function deleteObj(int $int)
    {
        // TODO: Implement deleteObj() method.
    }
}