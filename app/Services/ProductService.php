<?php

namespace App\Services;

use App\{Product, ProductImage};
use App\Services\Interfaces\{ICrud, IQuery};
use Illuminate\Http\{JsonResponse, Response};

class ProductService implements ICrud, IQuery
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
    public function saveNewObj($data): JsonResponse
    {
        $product = new Product();
        $product->name = (string)$data['request']->name;
        $product->slug = (string)$data['slug'];
        $product->description = (string)$data['request']->description;
        $product->type = (int)$data['request']->type;
        $product->category_id = (int)$data['request']->category_id;
        $product->save();

        if (!empty($product->id) && !empty($data['image'])) {
            foreach ($data['image'] as $image) {
                $productImages = new ProductImage();
                $productImages->image = $image;
                $productImages->product_id = $product->id;
                $productImages->save();
            }
        }

        return response()->json(
            [
                'data' => "New product {$product->name} Created!"
            ], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getObjById(int $id): JsonResponse
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
    public function updateObj($data): JsonResponse
    {
        $product = Product::findOrFail($data['id']);
        $product->name = (string)$data['request']->name;
        $product->slug = (string)$data['slug'];
        $product->description = (string)$data['request']->description;
        $product->category_id = (int)$data['request']->category_id;
        $product->type = (int)$data['request']->type;
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

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function relationshipWith(int $id)
    {
        $productWithVariationsAndSpecifications = Product::with('variations.specifications')->findOrFail($id);
        return response()->json(
            [
                'data' => $productWithVariationsAndSpecifications
            ], Response::HTTP_OK);
    }
}