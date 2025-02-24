<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductReqValidation;
use Illuminate\Validation\ValidationException;

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
            return $productBO;
        } else {
            return http_response_code(405);
        }
    }
    public function createProduct(ProductReqValidation $request)
    {

        if ($request->isMethod('POST')) {
            try {
                $validatedData = $request->validated();
                $product = $this->productService->createProduct($validatedData);
                return $product;
            } catch (ValidationException $e) {
                return $e->errors();
            }
        } else {
            return response()->json(['code' => 404, 'message' => 'Incorrect http Method'], 405);
        }
    }
    public function update(ProductReqValidation $request, $id)
    {
        if ($request->isMethod('PUT') && isset($id) && !empty($id) && $id > 0) {
            try {

                $validatedData = $request->validated();
                $product = $this->productService->updateProduct($id, $validatedData);
                return $product;
            } catch (ValidationException $e) {
                return $e->errors();
            }
        } else {
            return response()->json(['code' => 404, 'message' => 'Soemthing went wrong'], 405);
        }
    }
    public function delete($id)
    {
        if (isset($id) && !empty($id) && $id > 0) {
            $product = $this->productService->deleteProduct($id);
            return $product;
        } else {
            return response()->json(['code' => 404, 'message' => 'Soemthing went wrong'], 405);
        }
    }
    public function getCategory(Request $req)
    {

        if ($req->isMethod('GET')) {
            $productBO = [];
            $productBO = $this->productService->getAllCategory();
            return $productBO;
        } else {
            return http_response_code(405);
        }
    }
}