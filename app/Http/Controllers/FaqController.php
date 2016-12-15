<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
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
        return view('faq/add_faq');
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
        
        return redirect('/admin/faqs_overview');
    }
    
}
