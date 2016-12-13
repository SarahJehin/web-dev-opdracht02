<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Collection;
use App\Color;
use App\Image;
use App\Specification;

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
        $colors = Color::all();
        return view('products/add_product', ['categories' => $categories, 'collections' => $collections, 'colors' => $colors]);
    }
    
    public function add_product(Request $request) {
        
        $this->validate($request, [
            'name_nl' => 'required|string|max:100',
            'name_fr' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'description_nl' => 'required|string|max:500',
            'description_fr' => 'required|string|max:500',
            'description_en' => 'required|string|max:500',
            'price' => 'required|numeric',
            'category' => 'required|numeric',
        ]);
        
        $product = new Product([
            'name_nl' => $request->name_nl,
            'name_fr' => $request->name_fr,
            'name_en' => $request->name_en,
            'description_nl' => $request->description_nl,
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'price' => $request->price,
            'category_id' => $request->category
        ]);
        
        $product->save();
        
        //save collections
        if(isset($request->collection)) {
            foreach($request->collection as $collection_id) {
                $product->collections()->attach($collection_id);
            }
        }
        //save colors
        if(isset($request->color)) {
            foreach($request->color as $color_id) {
                $product->colors()->attach($color_id);
            }
        }
        
        //save specifications
        foreach($request->specs as $spec) {
            if($spec['name_nl'] && $spec['description_nl']) {
                $specification = new Specification([
                    'title_nl' => $spec['name_nl'],
                    'title_fr' => $spec['name_fr'],
                    'title_en' => $spec['name_en'],
                    'description_nl' => $spec['description_nl'],
                    'description_fr' => $spec['description_fr'],
                    'description_en' => $spec['description_en'],
                ]);
                
                $product->specifications()->save($specification);
            }
        }
        
        //save images
        $allowed_extensions = ["jpeg", "png"];
        
        if ($request->hasFile('image')) {
            foreach($request->image as $image) {
                if ($image->isValid()) {
                    if (in_array($image->guessClientExtension(), $allowed_extensions)) {
                        //create new file name
                        $new_file_name = time() . $image->getClientOriginalName();
                        echo($new_file_name);
                        $image->move(base_path() . '/public/images/products/', $new_file_name);
                        
                        $image = new Image([
                            'image_path' => $new_file_name
                        ]);

                        $product->images()->save($image);
                    }
                }
            }
        }
        
        
        return redirect('/admin/products_overview');
        
        
        
    }
}
