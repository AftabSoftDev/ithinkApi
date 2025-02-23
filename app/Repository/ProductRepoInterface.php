<?php

namespace App\Repositories;

interface ProductRepoInterface
{
    public function getAllProduct();
    public function getByProductId($id);
    public function createProduct(array $data);
    public function updateProduct($id, array $data);
    public function deleteProduct($id);
}