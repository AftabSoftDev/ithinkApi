<?php

namespace App\Repository;

use App\DAO\Product;
use App\Models\Product as Products;
use App\Models\Category;


class ProductRepo implements ProductRepoInterface
{
    public function getAllProduct()
    {
        $product = Products::paginate(10);
        return $product;
    }

    public function getByProductId($id)
    {
        return Products::where('id', $id)->first();     
    }

    public function createProduct(array $data)
    {
        $product = Products::create($data);
        return $product;
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
    public function getAllCategory()
    {
        $product = Category::with('product')->get();
        return $product;
    }
}