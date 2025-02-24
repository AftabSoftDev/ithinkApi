<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    public $table = 'product';
    protected $fillable = ['name', 'price', 'description', 'sku', 'category_id'];


}