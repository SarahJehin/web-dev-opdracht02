<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd($categories);
        
        $name = 'name_' . App::getLocale();
        //dd($categories[0]->$name);
        
        return view('welcome', ['categories' => $categories]);
    }
}
