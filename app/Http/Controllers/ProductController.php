<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductReqValidation;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function getProducts(Request $req)
    {

        if ($req->isMethod('GET')) {
            $id = isset($req->id) ? (int) $req->input('id') : 0;
            $productBO = [];
            if (isset($id) && !empty($id) && is_numeric($id) && $id > 0) {
                $productBO = $this->productService->getProductById($id);
            } else {
                $productBO = $this->productService->getAllProducts();
            }
            return response()->json($productBO, 200);
        } else {
            return http_response_code(405);
        }
    }
    public function store(ProductReqValidation $request)
    {
        // The incoming request is already validated at this point.
        $validatedData = $request->validated();
        // $product = $this->productService->createProduct($validatedData);
        // return response()->json($product, 201);
    }
    public function update(ProductReqValidation $request)
    {
        // The incoming request is already validated at this point.
        $validatedData = $request->validated();
        // $product = $this->productService->createProduct($validatedData);
        // return response()->json($product, 201);
    }
}