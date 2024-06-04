<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addProduct(Request $request) {
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->initial_price = $request->input('initial_price');
        $product->selling_price = $request->input('selling_price');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->product_image = $request->file('product_image')->store("products");
        $product->save();
        return $product;
    }

    function productList() {
        return Product::all();
    }
}
