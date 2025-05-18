<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $product = [["Product 1"], ["Product 2"]];
        return $product;
    }
}
