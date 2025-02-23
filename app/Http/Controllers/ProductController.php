<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $req)
    {
        if ($req->isMethod('GET')) {
            return $req->all();
            if (isset($id) && !empty($id) && is_numeric($id) && $id > 0) {
                return $id;
            } else {
                return "No product ID provided";
            }
        } else {
            return http_response_code(405);
        }
    }
}