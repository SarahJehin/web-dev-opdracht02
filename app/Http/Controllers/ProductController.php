<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Collection;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view_products() {
        $products = Product::all();
        return view('products/products_overview', ['products' => $products]);
    }
    
    public function view_add_product() {
        $categories = Category::all();
        $collections = Collection::all();
        return view('products/add_product', ['categories' => $categories, 'collections' => $collections]);
    }
}
