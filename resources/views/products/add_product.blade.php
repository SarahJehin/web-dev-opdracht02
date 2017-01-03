@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>

                <div class="panel-body">
                    
                    <div>
                        <form method="post" action="{{url('/admin/add_product')}}" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <!--<ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>-->
                                    The form wasn't filled in correctly, check the errors below.
                                </div>
                            @endif
                            
                            <div class="col-md-12">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="name_nl">Naam:</label>
                                    <input class="form-control" type="text" name="name_nl" id="name_nl" value="{{ old('name_nl') }}" required>
                                    @if ($errors->has('name_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_nl">Beschrijving:</label>
                                    <textarea class="form-control" name="description_nl" id="description_nl" required>{{ old('description_nl') }}</textarea>
                                    @if ($errors->has('description_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="name_fr">Nom:</label>
                                    <input class="form-control" type="text" name="name_fr" id="name_fr" value="{{ old('name_fr') }}" required>
                                    @if ($errors->has('name_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_fr">La description:</label>
                                    <textarea class="form-control" name="description_fr" id="description_fr" required>{{ old('description_fr') }}</textarea>
                                    @if ($errors->has('description_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="name_en">Name:</label>
                                    <input class="form-control" type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required>
                                    @if ($errors->has('name_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('name_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="description_en">Description:</label>
                                    <textarea class="form-control" name="description_en" id="description_en" required>{{ old('description_en') }}</textarea>
                                    @if ($errors->has('description_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <h3>Afbeeldingen</h3>
                                <div>
                                    <input class="form-control" type="file" name="image[]" required>
                                    <input class="form-control" type="file" name="image[]">
                                    <input class="form-control" type="file" name="image[]">
                                    <input class="form-control" type="file" name="image[]">
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
                                    <input class="form-control" type="number" step="0.01" min="1" name="price" id="price" value="{{ old('price') }}" required>
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
                                        @if(old('category') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name}}</option>
                                        @else
                                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="collections">
                                    <h3>Collecties</h3>
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
                                    <h3>Kleuren</h3>
                                    @foreach($colors as $color)
                                    <div>
                                        <input type="checkbox" name="color[]" id="color{{$color->id}}" value="{{$color->id}}" <?php if(old('color') && in_array($color->id, old('color'))){ echo("checked");} ?>>
                                        <label style="background-color:{{$color->hexcode}}" for="color{{$color->id}}"><i class="fa fa-check" aria-hidden="true"></i></label>
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
@section('custom_js')
<script>
    console.log('test');
    
</script>
@endsection