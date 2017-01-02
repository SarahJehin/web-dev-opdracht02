@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>

                <div class="panel-body">
                    <div>
                        <form method="post" action="{{url('/admin/add_product')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="name_nl">Naam:</label>
                                    <input class="form-control" type="text" name="name_nl" id="name_nl" value="{{$product->name_nl}}" required>
                                </div>
                                <div>
                                    <label for="description_nl">Beschrijving:</label>
                                    <textarea class="form-control" name="description_nl" id="description_nl" required>{{$product->description_nl}}</textarea>
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="name_fr">Nom:</label>
                                    <input class="form-control" type="text" name="name_fr" id="name_fr" value="{{$product->name_fr}}" required>
                                </div>
                                <div>
                                    <label for="description_fr">La description:</label>
                                    <textarea class="form-control" name="description_fr" id="description_fr" required>{{$product->description_fr}}</textarea>
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="name_en">Name:</label>
                                    <input class="form-control" type="text" name="name_en" id="name_en" value="{{$product->name_en}}" required>
                                </div>
                                <div>
                                    <label for="description_en">Description:</label>
                                    <textarea class="form-control" name="description_en" id="description_en" required>{{$product->description_en}}</textarea>
                                </div>
                                
                                <h3>Afbeeldingen</h3>
                                <div>
                                    <input class="form-control" type="file" name="image[]" required>
                                    <input class="form-control" type="file" name="image[]">
                                    <input class="form-control" type="file" name="image[]">
                                    <input class="form-control" type="file" name="image[]">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div>
                                    <label for="price"><h3>Prijs/Prix/Price:</h3></label>
                                    <input class="form-control" type="number" step="0.01" min="1" name="price" id="price" value="{{$product->price}}" required>
                                </div>

                                <div>
                                    <label for="category"><h3>Categorie</h3></label>
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                        <?php $cat_name = 'name_' . App::getLocale(); ?>
                                        <option value="{{ $category->id }}" <?php if($category->id === $product->category->id){echo('selected');}?> >{{ $category->$cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="collections">
                                    <h3>Collecties</h3>
                                    @foreach($collections as $collection)
                                    <div>
                                        <?php $col_name = 'name_' . App::getLocale(); ?>
                                        <input type="checkbox" name="collection[]" id="collection{{$collection->id}}" value="{{$collection->id}}">
                                        <label for="collection{{$collection->id}}">{{$collection->$col_name}}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="colors">
                                    <h3>Kleuren</h3>
                                    @foreach($colors as $color)
                                    <div>
                                        <input type="checkbox" name="color[]" id="color{{$color->id}}" value="{{$color->id}}" <?php if(in_array($color->id, $product_colors)){echo("checked");}?>>
                                        <label style="background-color:{{$color->hexcode}}" for="color{{$color->id}}"></label>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <div class="specifications">
                                    <h3>Specificaties</h3>
                                    <h4>1.</h4>
                                    <div>
                                        <input class="form-control name_input" type="text" name="specs[1][name_nl]" placeholder="naam (NL)" required>
                                        <input class="form-control desc_input" type="text" name="specs[1][description_nl]" placeholder="beschrijving (NL)" required>
                                        <input class="form-control name_input" type="text" name="specs[1][name_fr]" placeholder="nom (FR)">
                                        <input class="form-control desc_input" type="text" name="specs[1][description_fr]" placeholder="description (FR)">
                                        <input class="form-control name_input" type="text" name="specs[1][name_en]" placeholder="name (EN)">
                                        <input class="form-control desc_input" type="text" name="specs[1][description_en]" placeholder="description (EN)">
                                    </div>
                                    <h4>2.</h4>
                                    <div>
                                        <input class="form-control name_input" type="text" name="specs[2][name_nl]" placeholder="naam (NL)" required>
                                        <input class="form-control desc_input" type="text" name="specs[2][description_nl]" placeholder="beschrijving (NL)" required>
                                        <input class="form-control name_input" type="text" name="specs[2][name_fr]" placeholder="nom (FR)">
                                        <input class="form-control desc_input" type="text" name="specs[2][description_fr]" placeholder="description (FR)">
                                        <input class="form-control name_input" type="text" name="specs[2][name_en]" placeholder="name (EN)">
                                        <input class="form-control desc_input" type="text" name="specs[2][description_en]" placeholder="description (EN)">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="col-md-12">
                                <input class="btn btn-success" type="submit" value="Opslagen">
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection