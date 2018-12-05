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
use Illuminate\Http\Response;

class ProductHelper implements ICrud
{
    /**
     * Return all products list
     * @return object
     */
    public function index() : object
    {
        $products = Product::all();
        return response()->json(
            [
                'all_products' => $products
            ], Response::HTTP_OK);
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}