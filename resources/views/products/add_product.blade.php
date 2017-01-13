@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>

                <div class="panel-body">
                    <div>
                        <form class="product" method="post" action="{{url('/admin/add_product')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    The form wasn't filled in correctly, check the errors below.
                                </div>
                            @endif
                            
                            <div class="col-md-12">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="name_nl">Naam:</label>
                                    <input class="form-control" type="text" name="name_nl" id="name_nl" value="{{ old('name_nl') }}">
                                    @if ($errors->has('name_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_nl">Beschrijving:</label>
                                    <textarea class="form-control" name="description_nl" id="description_nl">{{ old('description_nl') }}</textarea>
                                    @if ($errors->has('description_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="name_fr">Nom:</label>
                                    <input class="form-control" type="text" name="name_fr" id="name_fr" value="{{ old('name_fr') }}">
                                    @if ($errors->has('name_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_fr">La description:</label>
                                    <textarea class="form-control" name="description_fr" id="description_fr">{{ old('description_fr') }}</textarea>
                                    @if ($errors->has('description_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="name_en">Name:</label>
                                    <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name_en') }}">
                                    @if ($errors->has('name_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_en">Description:</label>
                                    <textarea class="form-control" name="description_en" id="description_en">{{ old('description_en') }}</textarea>
                                    @if ($errors->has('description_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <h3>Afbeeldingen/Images</h3>
                                <span>(advised size: 500x400)</span>
                                <div>
                                    <input class="form-control" type="file" name="image[]" id="images_to_upload" multiple accept=".jpg,.png" onChange="makeFileList();">
                                    <ul id="file_list">
                                        <li>No Files Selected</li>
                                    </ul>
                                    @if ($errors->has('image'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div>
                                    <label for="price"><h3>Prijs/Prix/Price:</h3></label>
                                    <input class="form-control" type="number" step="0.01" name="price" id="price" value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div>
                                    <label for="category"><h3>Categorie/Catégorie/Category</h3></label>
                                    <select class="form-control" name="category" id="category">
                                        @foreach($categories as $category)
                                        @if(old('category') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name}}</option>
                                        @else
                                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="collections">
                                    <h3>Collecties/Collections</h3>
                                    @foreach($collections as $collection)
                                    <div>
                                        <input type="checkbox" name="collection[]" id="collection{{$collection->id}}" value="{{$collection->id}}" <?php if(old('collection') && in_array($collection->id, old('collection'))){ echo("checked");} ?>>
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
                                    <h3>Kleuren/Couleurs/Colors</h3>
                                    @foreach($colors as $color)
                                    <div>
                                        <input type="checkbox" name="color[]" id="color{{$color->id}}" value="{{$color->id}}" <?php if(old('color') && in_array($color->id, old('color'))){ echo("checked");} ?>>
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
                                    <h3>Specificaties/Spécifications/Specifications</h3>
                                    
                                    <h4>1.</h4>
                                    <div>
                                        <input class="form-control name_input" type="text" name="specs[1][name_nl]" placeholder="naam (NL)">
                                        <input class="form-control desc_input" type="text" name="specs[1][description_nl]" placeholder="beschrijving (NL)">
                                        <input class="form-control name_input" type="text" name="specs[1][name_fr]" placeholder="nom (FR)">
                                        <input class="form-control desc_input" type="text" name="specs[1][description_fr]" placeholder="description (FR)">
                                        <input class="form-control name_input" type="text" name="specs[1][name_en]" placeholder="name (EN)">
                                        <input class="form-control desc_input" type="text" name="specs[1][description_en]" placeholder="description (EN)">
                                    </div>
                                    <h4>2.</h4>
                                    <div>
                                        <input class="form-control name_input" type="text" name="specs[2][name_nl]" placeholder="naam (NL)">
                                        <input class="form-control desc_input" type="text" name="specs[2][description_nl]" placeholder="beschrijving (NL)">
                                        <input class="form-control name_input" type="text" name="specs[2][name_fr]" placeholder="nom (FR)">
                                        <input class="form-control desc_input" type="text" name="specs[2][description_fr]" placeholder="description (FR)">
                                        <input class="form-control name_input" type="text" name="specs[2][name_en]" placeholder="name (EN)">
                                        <input class="form-control desc_input" type="text" name="specs[2][description_en]" placeholder="description (EN)">
                                    </div>
                                    @if(count($errors->get('specs.*.*')) > 1)
                                    <span class="error_block"><strong>* All fields above are required.</strong></span>
                                    @endif
                                </div>
                                
                            </div>
                            
                            <div class="col-md-12">
                                <input class="btn btn-success" type="submit" value="Save">
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