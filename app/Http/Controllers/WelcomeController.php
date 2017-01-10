<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;
use App\Collection;
use App\Product;
use App\HotItem;
use App\Specification;
use App\Faq;
use DB;
use Cookie;
use Illuminate\Cookie\CookieJar;
use Mail;

class WelcomeController extends Controller
{
    public function view_landing(Request $request) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        if($request->cookie('lang')){
            return redirect('/' . App::getLocale());
        }
        else {
            return view('landing', ['categories' => $categories]);
        }
    }
    
    public function choose_lang(CookieJar $cookieJar, $lang) {
        $cookieJar->queue(cookie('lang', $lang, 45000));
        return redirect('/' . $lang);
    }
    
    public function index()
    {
        $categories = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $hot_items = HotItem::orderBy('position')->with(array('product'=>function($query){
            $query->select('id','name_' . App::getLocale() . ' AS name', 'price', 'category_id')->with('images')->with(array('category'=>function($q){
                $q->select('id','name_' . App::getLocale() . ' AS name');
            }));
        }))->get();
        return view('welcome', ['categories' => $categories, 'hot_items' => $hot_items]);
    }
    
    public function set_cookie() {
        //setCookie that expires in 30 days
        setcookie("client_ip", request()->ip(), time()+(3600*24*30));
        return back();
    }
    
    public function view_search() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        return view('search', ['categories' => $categories]);
    }
    
    public function search_products(Request $request) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        
        $query = Product::with('images')->with(array('category'=>function($q){
            $q->select('id','name_' . App::getLocale() . ' AS name');
        }))->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description', 'category_id')->where('name_' . App::getLocale(), 'like', '%' . $request->searchword . '%');
        
        if($request->from != "" && $request->to != "") {
            $query = $query->whereBetween('price', [$request->from, $request->to]);
        }
        
        if(isset($request->category)) {
            $cats = array();
            foreach($request->category as $cat){
                array_push($cats, $cat);
            }
            $query = $query->whereIn('category_id', $cats);
        }
        
        $product_results = $query->paginate(10)->appends(['searchword' => $request->searchword, 'from' => $request->from, 'to' => $request->to, 'category' => $request->category]);;
        
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
            ->paginate(10)->appends('searchword', $request->searchword);
        
        return view('faq', ['categories' => $categories, 'faqs' => $faqs, 'searchword' => $request->searchword]);
        
        //session(['faq_searchword' => $request->searchword]);
        //return redirect(/*to the handler*/);
        
    }
    
    public function view_about_us() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $faqs = Faq::select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')->paginate(5);
        return view('about_us', ['categories' => $categories, 'faqs' => $faqs]);
    }
    
    public function contact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);
        
        //dd($request);
        //send mail to the kowloon team + redirect to confirm blade
        Mail::send('emails.contact_mail', ['email' => $request->email, 'contact_message' => $request->message], function($message) use($request) {
            $message->to('sarah.jehin@student.kdg.be');
            $message->from($request->email);
            $message->subject('New contact mail!');
        });
        
        return redirect(App::getLocale() . '/contact_confirmation');
    }
    
    public function contact_confirmation() {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        return view('contact_confirmation', ['categories' => $categories]);
    }
    
    public function category_products($lang, $category_id) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $category = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->where('id', $category_id)->first();
        $products = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'price')->where('category_id', $category_id)->paginate(12);
        $collections = Collection::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        
        return view('category_products', ['category' => $category, 'categories' => $categories, 'products' => $products, 'collections' => $collections]);
    }
    
    public function products_filter(Request $request) {
        $this->validate($request, [
            'from' => 'numeric|min:1',
            'to' => 'numeric|min:1',
        ]);
        
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $category = Category::with('products')->select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->where('id', $request->category_id)->first();
        $collections = Collection::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        
        $query = Product::with('images')->select('id', 'name_' . App::getLocale() . ' AS name', 'price')->where('category_id', $request->category_id);
        
        //price filter
        if($request->from != "" && $request->to != "") {
            $query = $query->whereBetween('price', [$request->from, $request->to]);
        }
        
        //collection filter
        if(isset($request->collection)) {
            $cols = array();
            foreach($request->collection as $col){
                array_push($cols, $col);
            }
            $query = $query->whereHas('collections', function($q) use ($cols){
                $q->whereIn('collections.id', $cols);
            });
        }
        
        //sort filter
        if(isset($request->sort)) {
            if($request->sort != "none") {
                switch ($request->sort) {
                    case "low_high":
                        $query = $query->orderBy('price', 'asc');
                        break;
                    case "high_low":
                        $query = $query->orderBy('price', 'desc');
                        break;
                    case "latest":
                        $query = $query->latest();
                        break;
                    case "oldest":
                        $query = $query->oldest();
                        break;
                    default:
                        //do nothing;
                }
            }
        }
        
        $products = $query->paginate(12);
        return view('category_products', ['category' => $category, 'categories' => $categories, 'products' => $products, 'collections' => $collections]);
    }
    
    public function product_details($lang, $category_name, $product_id) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        
        $product = Product::with('images')
            ->select('id', 'name_' . App::getLocale() . ' AS name', 'description_' . App::getLocale() . ' AS description', 'price', 'category_id')
            ->where('id', $product_id)->with(['collections' => function($q) {
                $q->select('collections.id', 'collections.name_' . App::getLocale() . ' as name');
            }])->first();
        
        $category = Category::where('id', $product->category_id)->select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->first();
        
        $specifications = Specification::where('product_id', $product_id)
            ->select('id', 'title_' . App::getLocale() . ' AS title', 'description_' . App::getLocale() . ' AS description')->get();
        
        //get related products (products of same category)
        $related_products = Product::where('category_id', $product->category_id)->select('id', 'name_' . App::getLocale() . ' AS name')->where('id', '<>', $product_id)->limit(4)->get();
        
        //select faqs associated with this product
        $faqs = Faq::whereHas('products', function($q) use ($product_id){
            $q->where('products.id', $product_id);
        })->select('id', 'question_' . App::getLocale() . ' AS question', 'answer_' . App::getLocale() . ' AS answer')->get();
        return view('product_details', ['product' => $product, 'category' => $category, 'specifications' => $specifications, 'categories' => $categories, 'faqs' => $faqs, 'related_products' => $related_products]);
    }
    
}
