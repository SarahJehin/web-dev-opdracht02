<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;
use App\Product;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        /*DB::enableQueryLog();
        $categories = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name')->get();
        dd($categories);
        dd(DB::getQueryLog());*/
        //$categories = Category::all();
        $name = 'name_' . App::getLocale();
        $categories = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        return view('welcome', ['categories' => $categories]);
    }
    
    public function set_cookie() {
        //dd(request()->ip());
        //$cookie = cookie('client_ip', request()->ip(), 2000);
        //setCookie that expires in 30 days
        setcookie("client_ip", request()->ip(), time()+(3600*24*30));
        //dd($cookie);
        return back();
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
