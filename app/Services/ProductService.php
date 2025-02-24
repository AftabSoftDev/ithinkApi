<?php

namespace App\Services;

use App\Repository\ProductRepoInterface;
use App\BO\ProductBO;


class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepoInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts()
    {
        $data = $this->productRepo->getAllProduct();
        if (isset($data) && count($data) > 0 && !empty($data)) {
        $databo= $data->map(function ($product) {
         return new ProductBO(
                $product->id,
                $product->name,
                $product->description,
                $product->sku,
                $product->price,
                $product->category_id,
                $product->created_at,
                $product->updated_at
            );
        });
            return response()->json(['code' => 200, 'data' => $databo], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'No Records Found'], 404);
        }
    }

    public function getProductById($id)
    {
       
        $product =  $this->productRepo->getByProductId($id);
        if (isset($product) && !is_array($product) && !empty($product)) {
            $data = new ProductBO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->sku,
                    $product->price,
                    $product->category_id,
                    $product->created_at,
                    $product->updated_at
                );
            return response()->json(['code' => 200, 'data' => $data], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'No Records Found'], 404);
        }
       
    }

    public function createProduct($data)
    {

        
        $data= $this->productRepo->createProduct($data);
        if (isset($data) && !is_array($data) && !empty($data)) {
            $data = new ProductBO(
                $data->id,
                $data->name,
                $data->description,
                $data->sku,
                $data->price,
                $data->category_id,
                $data->created_at,
                $data->updated_at
            );
            return response()->json(['code' => 200, 'data' => $data], 201);
        } else {
            return response()->json(['code' => 404, 'message' => 'Not Created'], 404);
        }
    }

    public function updateProduct($id, $data)
    {
        $data = $this->productRepo->updateProduct($id, $data);
        if ($data != null) {
            if (isset($data) && !is_array($data) && !empty($data)) {
                $data = new ProductBO(
                    $data->id,
                    $data->name,
                    $data->description,
                    $data->sku,
                    $data->price,
                    $data->category_id,
                    $data->created_at,
                    $data->updated_at
                );
                return response()->json(['code' => 200, 'data' => $data], 200);
            } else {
                return response()->json(['code' => 404, 'message' => 'Not Created'], 404);
            }
        } else {
            return response()->json(['code' => 404, 'message' => 'Record not exists'], 404);
        }
    }

    public function delete($id)
    {
        if (isset($id) && !empty($id)) {

            $data = $this->productRepo->deleteProduct($id);
            if (isset($data) && !empty($data) && $data === true) {
                return response()->json(['code' => 200, 'data' => "Record Deleted Successfully"], 200);
            } else {
                return response()->json(['code' => 404, 'message' => 'Unable to Deleted'], 404);
            }
        } else {
            return response()->json(['code' => 404, 'message' => 'ID not exists'], 404);
        }
    }
    public function getAllCategory()
    {
        $data = $this->productRepo->getAllCategory();

        if (isset($data) && count($data) > 0 && !empty($data)) {
            return response()->json(['code' => 200, 'data' => $data], 200);
        } else {
            return response()->json(['code' => 404, 'message' => 'No Records Found'], 404);
        }
    }

}