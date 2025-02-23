<?php 


class ProductBO {
public $id;
public $name;
public $price;
public $description;
public $created_at;
public $updated_at;

public function __construct($id, $name, $price, $description, $created_at, $updated_at) {
$this->id = $id;
$this->name = $name;
$this->price = $price;
$this->description = $description;
$this->created_at = $created_at;
$this->updated_at = $updated_at;
}
}