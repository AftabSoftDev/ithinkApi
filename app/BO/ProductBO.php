<?php

namespace App\BO;

class ProductBO
{
    public $id;
    public $name;
    public $price;
    public $sku;
    public $description;
    public $category_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $price, $sku, $category_id, $description, $created_at, $updated_at)
    {
        $this->id = $id;        
        $this->name = $name;
        $this->price = $price;
        $this->sku = $sku;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
}
}