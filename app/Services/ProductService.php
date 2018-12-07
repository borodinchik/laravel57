<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/5/18
 * Time: 12:26 PM
 */

namespace App\Services;


use App\Product;
use App\Services\Interfaces\ICrud;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductService implements ICrud
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCollection() : JsonResponse
    {
        $products = Product::all();
        return response()->json(
            [
                'all_products' => $products
            ], Response::HTTP_OK);
    }

    public function saveNewObj($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->type = $request->type;
        $product->save();

        return response()->json(
            [
                'data' => "New product {$product->name} Created!"
            ], Response::HTTP_CREATED);
    }

    public function getObjById(int $id)
    {
        // TODO: Implement show() method.
    }

    public function updateObj(int $id)
    {
        // TODO: Implement update() method.
    }

    public function deleteObj(int $id)
    {
        // TODO: Implement delete() method.
    }
}