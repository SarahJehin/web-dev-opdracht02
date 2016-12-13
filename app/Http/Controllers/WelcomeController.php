<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;
use App\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $name = 'name_' . App::getLocale();
        return view('welcome', ['categories' => $categories]);
    }
    
    public function about_us() {
        $categories = Category::all();
        return view('about_us', ['categories' => $categories]);
    }
    
    public function category_products($category_id)
    {
        $categories = Category::all();
        $category = Category::find($category_id);
        return view('category_products', ['category' => $category, 'categories' => $categories]);
    }
    
    public function product_details($product_id) {
        //
        $categories = Category::all();
        $product = Product::find($product_id);
        return view('product_details', ['product' => $product, 'categories' => $categories]);
    }
    
}
