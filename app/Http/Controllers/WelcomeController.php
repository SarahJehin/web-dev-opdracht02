<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;
use App\Product;
use App\Specification;
use App\Faq;
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
    
    public function view_search() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        return view('search', ['categories' => $categories]);
    }
    
    public function search_products(Request $request) {
        //dd($request);
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        
        
        
        $query = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description')->where('name_' . App::getLocale(), 'like', '%' . $request->searchword . '%');
        
        
        if($request->from != "" && $request->to != "") {
            $query = $query->whereBetween('price', [$request->from, $request->to]);
        }
        
        
        if(isset($request->category)) {
            $cats = "";
            //dd($request->category);
            foreach($request->category as $cat){
                //echo($cat);
                $cats = $cats . $cat . ",";
            }
            $cats = rtrim($cats, ",");
            
            $query = $query->whereIn('category_id', [$cats]);
        }
        
        //$product_results = $query->toSql();
        $product_results = $query->paginate(10);
        //dd($product_results);
        /*
        $extra = "";
        
        if(isset($request->category)) {
            $extra = "->whereIn('category_id', [";
        
            foreach($request->category as $category){
                $extra = $extra . $category . ",";
            }
            $extra = rtrim($extra, ",");
            $extra = $extra . "])";
        }
        
        if($request->from != "" && $request->to != "") {
            $extra = $extra . "->whereBetween('price', [" . $request->from . ", " . $request->to . "])";
        }
        dd($extra);
        */
        
        /*$product_results = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description')
            ->where('name_' . App::getLocale(), 'like', '%' . $request->searchword . '%')
            ->paginate(10);*/
        //dd($product_results);
        return view('search', ['categories' => $categories, 'product_results' => $product_results]);
    }
    
    public function view_faq() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $faqs = Faq::select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')->paginate(10);
        
        return view('faq', ['categories' => $categories, 'faqs' => $faqs]);
    }
    
    public function search_faq(Request $request) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $faqs = Faq::select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')
            ->where('question_' . App::getLocale(), 'like', '%' . $request->searchword . '%')
            ->paginate(10);
        
        return view('faq', ['categories' => $categories, 'faqs' => $faqs, 'searchword' => $request->searchword]);
    }
    
    public function view_about_us() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $faqs = Faq::select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')->paginate(5);
        return view('about_us', ['categories' => $categories, 'faqs' => $faqs]);
    }
    
    public function category_products($category_id)
    {
        //$categories = Category::all();
        //$category = Category::find($category_id);
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $category = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name')->where('id', $category_id)->first();
        $products = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'price')->where('category_id', $category_id)->paginate(12);
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
        
        //get related products (products of same category)
        $related_products = Product::where('category_id', $product->category_id)->select('id', 'name_' . App::getLocale() . ' AS name')->where('id', '<>', $product_id)->limit(4) ->get();
        
        //select faqs associated with this product
        $faqs = Faq::whereHas('products', function($q) use ($product_id){
            $q->where('products.id', $product_id);
        })->select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')->get();
        return view('product_details', ['product' => $product, 'specifications' => $specifications, 'categories' => $categories, 'faqs' => $faqs, 'related_products' => $related_products]);
    }
    
}
