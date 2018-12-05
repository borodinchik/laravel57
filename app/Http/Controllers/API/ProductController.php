<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductHelper;

class ProductController extends Controller
{
    public function index(ProductHelper $helper)

    {
        return $helper->index();
    }
}
