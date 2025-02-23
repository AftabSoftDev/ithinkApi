<?php

namespace App\DAO;

class Category
{
    public $id;
    public $name;
    public $parent_category_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $name, $parent_category_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_category_id = $parent_category_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}