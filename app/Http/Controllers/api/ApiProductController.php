<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ApiProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getProduct()
    {
        try {
            //code...
            $products = $this->product->all();
            return response([
                'success' => true,
                'message' => 'successfull',
                'data' => $products

            ], status: 200);
        } catch (\Throwable $th) {
            throw $th;
            return response([
                'success' => false,
                'message' => 'kết nối dến server bị lỗi',
            ], status: 500);
        }
    }
}
