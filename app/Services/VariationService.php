<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 12/10/18
 * Time: 5:27 PM
 */

namespace App\Services;


use App\Services\Interfaces\ICrud;
use App\Variation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class VariationService implements ICrud
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCollection() : JsonResponse
    {
        $variations = Variation::all();
        return response()->json(
            [
                'variations' => $variations
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function saveNewObj($data) : JsonResponse
    {
        $variation = new Variation();
        $variation->sku = (string)$data['request']->sku;
        $variation->image = (string)$data['image'];
        $variation->product_id = (int)$data['request']->product_id;
        $variation->price = $data['request']->price;
        $variation->in_stock = (int)$data['request']->in_stock;
        $variation->save();

        return response()->json(
            [
                'message' => "Variation {$data['request']->sku} added!"
            ], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getObjById(int $id) : JsonResponse
    {
        $variation = Variation::findOrFail($id);
        return response()->json(
            [
               "variation" => $variation
            ], Response::HTTP_OK);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function updateObj($data)
    {
        $product = Variation::findOrFail($data['id']);
        $product->sku = $data['request']->sku;
        $product->image = $data['image'];
        $product->product_id = $data['request']->product_id;
        $product->price = $data['request']->price;
        $product->in_stock = $data['request']->in_stock;
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