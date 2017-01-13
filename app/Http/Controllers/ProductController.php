<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Collection;
use App\Color;
use App\Image;
use App\Specification;
use App\HotItem;
use App;

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
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $collections = Collection::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $colors = Color::all();
        return view('products/add_product', ['categories' => $categories, 'collections' => $collections, 'colors' => $colors]);
    }
    
    public function add_product(Request $request) {
        $this->validate($request, [
            'name_nl' => 'required|string|max:100',
            'name_fr' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'description_nl' => 'required|string|max:750',
            'description_fr' => 'required|string|max:750',
            'description_en' => 'required|string|max:750',
            'image' => 'required',
            'price' => 'required|numeric|min:0.1',
            'category' => 'required|numeric',
            'collection' => 'required|min:1',
            'color' => 'required|min:1',
            'specs.*.name_nl' => 'required|string|max:30',
            'specs.*.name_fr' => 'required|string|max:30',
            'specs.*.name_en' => 'required|string|max:30',
            'specs.*.description_nl' => 'required|string|max:100',
            'specs.*.description_fr' => 'required|string|max:100',
            'specs.*.description_en' => 'required|string|max:100',
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
                        $new_file_name = time() . str_replace(" ", "-", $image->getClientOriginalName());
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
    
    public function view_edit_product($id) {
        $categories = Category::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $collections = Collection::select('id', 'name_' . App::getLocale() . ' AS name', 'name_en')->get();
        $colors = Color::all();
        $product = Product::find($id);
        $product_colors = Color::whereHas('products', function($q) use ($product){
            $q->where('products.id', $product->id);
        })->pluck('id')->toArray();
        $product_collections = Collection::whereHas('products', function($q) use ($product){
            $q->where('products.id', $product->id);
        })->pluck('id')->toArray();
        return view('products/edit_product', ['categories' => $categories, 'collections' => $collections, 'colors' => $colors, 'product' => $product, 'product_colors' => $product_colors, 'product_collections' => $product_collections]);
    }
    
    public function edit_product(Request $request) {
        $this->validate($request, [
            'name_nl' => 'required|string|max:100',
            'name_fr' => 'required|string|max:100',
            'name_en' => 'required|string|max:100',
            'description_nl' => 'required|string|max:750',
            'description_fr' => 'required|string|max:750',
            'description_en' => 'required|string|max:750',
            'images_amount' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0.1',
            'category' => 'required|numeric',
            'collection' => 'required|min:1',
            'color' => 'required|min:1',
            'specs.*.name_nl' => 'required|string|max:30',
            'specs.*.name_fr' => 'required|string|max:30',
            'specs.*.name_en' => 'required|string|max:30',
            'specs.*.description_nl' => 'required|string|max:100',
            'specs.*.description_fr' => 'required|string|max:100',
            'specs.*.description_en' => 'required|string|max:100',
        ]);
        
        //update product
        $product = Product::find($request->product_id);
        $product->name_nl = $request->name_nl;
        $product->name_fr = $request->name_fr;
        $product->name_en = $request->name_en;
        $product->description_nl = $request->description_nl;
        $product->description_fr = $request->description_fr;
        $product->description_en = $request->description_en;
        $product->price = $request->price;
        $product->category_id = $request->category;
        
        $product->save();
        
        //detach collections and colors
        $product->collections()->detach();
        $product->colors()->detach();
        
        //update collections
        if(isset($request->collection)) {
            foreach($request->collection as $collection_id) {
                $product->collections()->attach($collection_id);
            }
        }
        //update colors
        if(isset($request->color)) {
            foreach($request->color as $color_id) {
                $product->colors()->attach($color_id);
            }
        }
        //update specifications
        foreach($request->specs as $spec) {
            $specification = Specification::find($spec['id']);
            
            $specification->title_nl = $spec['name_nl'];
            $specification->title_fr = $spec['name_fr'];
            $specification->title_en = $spec['name_en'];
            $specification->description_nl = $spec['description_nl'];
            $specification->description_fr = $spec['description_fr'];
            $specification->description_en = $spec['description_en'];
                
            $product->specifications()->save($specification);
        }
        //update images
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
        return redirect('/admin/products_overview')->with("message", "Product successfully updated");
    }
    
    public function delete_image(Request $request) {
        $image_to_delete = Image::find($request->image_id);
        $image_to_delete->delete();
        
        return response()->json([
            'image' => $request->image_id,
        ]);
    }
    
    public function delete_product($id) {
        $product = Product::find($id);
        //check if this product is an hot_item
        $hot_items = HotItem::pluck('product_id')->toArray();
        if(in_array($id, $hot_items)) {
            return redirect('/admin/products_overview')->with("warning", "Product could not be deleted because it is a hot item!");
        }
        else {
            $product->delete();
            return redirect('/admin/products_overview')->with("message", "Product deleted successfully");
        }
    }
    
    public function view_set_hot_items() {
        $products = Product::select('id', 'name_' . App::getLocale() . ' as name', 'name_en')->get();
        $hot_items = HotItem::orderBy('position')->with('product')->get();
        return view('products/set_hot_items', ['products' => $products, 'hot_items' => $hot_items]);
    }
    
    public function set_hot_items(Request $request) {
        
        $hot_items = HotItem::all();
        
        //if no hot items exist yet, create them
        if($hot_items->isEmpty()) {
            foreach($request->hot_item as $key => $product_id) {
                $position = $key+1;
                $hot_item = new HotItem([
                    'product_id' => $product_id,
                    'position' => $position,
                ]);

                $hot_item->save();
            }
        }
        //otherwise, update them
        else {
            foreach($request->hot_item as $key => $product_id) {
                $position = $key+1;
                $hot_item = HotItem::where('position', $position)->first();
                $hot_item->product_id = $product_id;

                $hot_item->save();
            }
        }
        
        return redirect('/admin/set_hot_items')->with('message', 'Hot items were updated!');;
    }
    
}
