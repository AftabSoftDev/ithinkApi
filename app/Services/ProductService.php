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
        return $databo;
    }

    public function getProductById($id)
    {

        
        $product =  $this->productRepo->getByProductId($id);
        // return $product;
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
    }

    public function createProduct($data)
    {

        
        $data= $this->productRepo->createProduct($data);
        // return new Product(
        //     $data->id,
        //     $data->name,
        //     $data->description,
        //     $data->sku,
        //     $data->price,
        //     $data->category_id,
        //     $data->created_at,
        //     $data->updated_at
        // );
    }

    public function updateProduct($id, $data)
    {
        return $this->productRepo->updateProduct($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepo->deleteProduct($id);
    }
}