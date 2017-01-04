@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit product</div>

                <div class="panel-body">
                    <div>
                        <form class="product" method="post" action="{{url('/admin/edit_product')}}" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    The form wasn't filled in correctly, check the errors below.
                                </div>
                            @endif
                            
                            <div class="col-md-12">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="name_nl">Naam:</label>
                                    <input class="form-control" type="text" name="name_nl" id="name_nl" value="{{ old('name_nl', $product->name_nl) }}" required>
                                    @if ($errors->has('name_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_nl">Beschrijving:</label>
                                    <textarea class="form-control" name="description_nl" id="description_nl" required>{{ old('description_nl', $product->description_nl)}}</textarea>
                                    @if ($errors->has('description_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="name_fr">Nom:</label>
                                    <input class="form-control" type="text" name="name_fr" id="name_fr" value="{{ old('name_fr', $product->name_fr)}}" required>
                                    @if ($errors->has('name_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_fr">La description:</label>
                                    <textarea class="form-control" name="description_fr" id="description_fr" required>{{ old('description_fr', $product->description_fr)}}</textarea>
                                    @if ($errors->has('description_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="name_en">Name:</label>
                                    <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name_en', $product->name_en)}}" required>
                                    @if ($errors->has('name_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_en">Description:</label>
                                    <textarea class="form-control" name="description_en" id="description_en" required>{{ old('description_en', $product->description_en)}}</textarea>
                                    @if ($errors->has('description_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <h3>Afbeeldingen</h3>
                                <div class="existing_images">
                                    @foreach($product->images as $image)
                                    <figure>
                                        <img src="{{url('/images/products/' . $image->image_path)}}">
                                        <div class="btn btn-danger remove_img" img_id="{{$image->id}}">Remove</div>
                                    </figure>
                                    @endforeach
                                </div>
                                <div>
                                    <input class="form-control" type="file" name="image[]" id="images_to_upload" multiple onChange="makeFileList();">
                                    <input type="hidden" id="images_amount" name="images_amount" value="{{count($product->images)}}">
                                    <ul id="file_list">
                                        <li>No Files Selected</li>
                                    </ul>
                                </div>
                                @if ($errors->has('images_amount'))
                                    <span class="error_block">
                                        <strong>*{{ $errors->first('images_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-md-12">
                                <div>
                                    <label for="price"><h3>Prijs/Prix/Price:</h3></label>
                                    <input class="form-control" type="number" step="0.01" min="1" name="price" id="price" value="{{ old('description_en', $product->price)}}" required>
                                    @if ($errors->has('price'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <label for="category"><h3>Categorie</h3></label>
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" <?php if(old('category')){if($category->id == old('category')){echo('selected');}}
                                        elseif($category->id === $product->category->id){echo('selected');}?> >{{ $category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="collections">
                                    <h3>Collecties</h3>
                                    @foreach($collections as $collection)
                                    <div>
                                        <input type="checkbox" name="collection[]" id="collection{{$collection->id}}" value="{{$collection->id}}" <?php
                                        if(old('collection')){ 
                                            if(in_array($collection->id, old('collection'))){ 
                                                echo("checked");
                                            }
                                        }
                                        elseif(in_array($collection->id, $product_collections)){echo("checked");}?>>
                                        <label for="collection{{$collection->id}}"><i class="fa fa-check" aria-hidden="true"></i>{{$collection->name}}</label>
                                    </div>
                                    @endforeach
                                    @if ($errors->has('collection'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('collection') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="colors">
                                    <h3>Kleuren</h3>
                                    @foreach($colors as $color)
                                    <div>
                                        <input type="checkbox" name="color[]" id="color{{$color->id}}" value="{{$color->id}}" <?php 
                                        if(old('color')){ 
                                            if(in_array($color->id, old('color'))){ 
                                                echo("checked");
                                            }
                                        }
                                        elseif(in_array($color->id, $product_colors)){
                                            echo("checked");
                                        }?>>
                                        <label style="background-color:{{$color->hexcode}}" for="color{{$color->id}}"></label>
                                    </div>
                                    @endforeach
                                    @if ($errors->has('color'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="specifications">
                                    <h3>Specificaties</h3>
                                    @foreach($product->specifications as $key => $spec)
                                    <h4>{{$key+1}}</h4>
                                    <input type="hidden" name="specs[{{$key+1}}][id]" value="{{$spec->id}}">
                                    <div>
                                        <input class="form-control name_input" type="text" name="specs[{{$key+1}}][name_nl]" placeholder="naam (NL)" value="{{ old('specs.' . ($key+1) . '.name_nl', $spec->title_nl)}}">
                                        <input class="form-control desc_input" type="text" name="specs[{{$key+1}}][description_nl]" placeholder="beschrijving (NL)" value="{{ old('specs.' . ($key+1) . '.description_nl', $spec->description_nl)}}">
                                        <input class="form-control name_input" type="text" name="specs[{{$key+1}}][name_fr]" placeholder="nom (FR)" value="{{ old('specs.' . ($key+1) . '.name_fr', $spec->title_fr)}}">
                                        <input class="form-control desc_input" type="text" name="specs[{{$key+1}}][description_fr]" placeholder="description (FR)" value="{{ old('specs.' . ($key+1) . '.description_fr', $spec->description_fr)}}">
                                        <input class="form-control name_input" type="text" name="specs[{{$key+1}}][name_en]" placeholder="name (EN)" value="{{ old('specs.' . ($key+1) . '.name_en', $spec->title_en)}}">
                                        <input class="form-control desc_input" type="text" name="specs[{{$key+1}}][description_en]" placeholder="description (EN)" value="{{ old('specs.' . ($key+1) . '.description_en', $spec->description_en)}}">
                                    </div>
                                    @endforeach
                                    @if(count($errors->get('specs.*.*')) > 0)
                                    <span class="error_block"><strong>* All fields above are required.</strong></span>
                                    @endif
                                    
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
@section('custom_js')
<script src="{{url('js/admin.js')}}"></script>

@endsection