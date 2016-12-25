<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;
use App\Product;
use App\Specification;
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
        //$categories = Category::all();
        //$category = Category::find($category_id);
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $category = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name')->where('id', $category_id)->first();
        $products = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'price')->where('category_id', $category_id)->get();
        //dd($categories, $category, $products);
        return view('category_products', ['category' => $category, 'categories' => $categories, 'products' => $products]);
    }
    
    public function product_details($product_id) {
        //
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        //$product = Product::find($product_id);
        //$product = Product::with('images')->with('specifications')->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description', 'category_id')->get();
        
        /*$product = DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('specifications', 'products.id', '=', 'specifications.product_id')
            ->select('products.*', 'images.product_id', 'specifications.title_' . App::getLocale() . ' as title')
            ->get();*/
        
        /*$product = Product::select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description', 'category_id')
            ->where('id', $product_id)
            ->with(['specifications' => function($query) {
            $query->where('description_en', 'nylon');
            //$query->select('description_nl as test');
            }])->get();*/
        
        $product = Product::with('images')
            ->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description', 'price', 'category_id')
            ->where('id', $product_id)->first();
        
        $specifications = Specification::where('product_id', $product_id)
            ->select('id', 'title_' . App::getLocale() . ' AS title', 'description_' . App::getLocale() . ' AS description')->get();
        
        return view('product_details', ['product' => $product, 'specifications' => $specifications, 'categories' => $categories]);
    }
    
}
