<?php 
namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::all(); // Fetch all products
    }

    public function getById($id)
    {
        return Product::find($id); // Find a product by its ID
    }

    public function create(array $data)
    {
        return Product::create($data); // Create a new product
    }

    public function update($id, array $data)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data); // Update product details
            return $product;
        }
        return null;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete(); // Delete a product
            return true;
        }
        return false;
    }
}