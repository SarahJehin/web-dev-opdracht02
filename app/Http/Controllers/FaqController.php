<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\Category;
use App\Product;
use App;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->lang = App::getLocale();
    }
    
    public function view_faqs() {
        $lang = $this->lang;
        $faqs = Faq::select('id', 'question_' . $lang . ' AS question', 'answer_' . $lang . ' AS answer')->get();
        return view('/faq/faqs_overview', ['faqs' => $faqs]);
    }
    
    public function view_add_faq() {
        
        $categories = Category::select('id', 'name_' . App::getLocale() . ' as name')->get();
        $products = Product::select('id', 'name_' . App::getLocale() . ' as name')->get();
        return view('faq/add_faq', ['categories' => $categories, 'products' => $products]);
    }
    
    public function add_faq(Request $request) {
        
        $this->validate($request, [
            'question_nl' => 'required|string|max:100',
            'question_fr' => 'required|string|max:100',
            'question_en' => 'required|string|max:100',
            'answer_nl' => 'required|string|max:500',
            'answer_fr' => 'required|string|max:500',
            'answer_en' => 'required|string|max:500',
        ]);
        
        $faq = new Faq([
            'question_nl' => $request->question_nl,
            'question_fr' => $request->question_fr,
            'question_en' => $request->question_en,
            'answer_nl' => $request->answer_nl,
            'answer_fr' => $request->answer_fr,
            'answer_en' => $request->answer_en
        ]);
        
        $faq->save();
        
        foreach($request->product as $product_id) {
            if($product_id != "none") {
                $faq->products()->attach($product_id);
            }
        }
        if($request->category != "none") {
            $faq->categories()->attach($request->category);
        }
        
        
        return redirect('/admin/faqs_overview');
    }
    
    
    public function view_edit_faq($id) {
        $faq = Faq::find($id);
        $categories = Category::select('id', 'name_' . App::getLocale() . ' as name')->get();
        $products = Product::select('id', 'name_' . App::getLocale() . ' as name')->get();
        return view('faq/edit_faq', ['faq' => $faq, 'categories' => $categories, 'products' => $products]);
    }
    
    public function edit_faq(Request $request) {
        
        $this->validate($request, [
            'question_nl' => 'required|string|max:100',
            'question_fr' => 'required|string|max:100',
            'question_en' => 'required|string|max:100',
            'answer_nl' => 'required|string|max:500',
            'answer_fr' => 'required|string|max:500',
            'answer_en' => 'required|string|max:500',
        ]);
        
        $faq = Faq::find($request->faq_id);
        
        $faq->question_nl = $request->question_nl;
        $faq->question_fr = $request->question_fr;
        $faq->question_en = $request->question_en;
        $faq->answer_nl = $request->answer_nl;
        $faq->answer_fr = $request->answer_fr;
        $faq->answer_en = $request->answer_en;
        
        $faq->categories()->detach();
        $faq->products()->detach();
            
        foreach($request->product as $product_id) {
            if($product_id != "none") {
                $faq->products()->attach($product_id);
            }
        }
        if($request->category != "none") {
            $faq->categories()->attach($request->category);
        }
        
        $faq->save();
        
        return redirect('/admin/faqs_overview');
    }
    
    public function delete_faq($id) {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('/admin/faqs_overview')->with("message", "Question deleted successfully");
    }
    
}
