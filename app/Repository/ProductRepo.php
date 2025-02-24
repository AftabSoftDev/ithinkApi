<?php

namespace App\Repository;

use App\DAO\Product;
use App\Models\Product as Products;


class ProductRepo implements ProductRepoInterface
{
    public function getAllProduct()
    {
        $product = Products::all();
        return $product;
    }

    public function getByProductId($id)
    {
        return Products::find($id);     
    }

    public function createProduct(array $data)
    {
        return Products::create($data); 
    }

    public function updateProduct($id, array $data)
    {
        $product = Products::find($id);
        if ($product) {
            $product->update($data); 
            return $product;
        }
        return null;
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete(); 
            return true;
        }
        return false;
    }
}