@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add FAQ</div>

                <div class="panel-body">
                    <div class="row">
                        <form method="post" action="{{url('/admin/add_faq')}}" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    The form wasn't filled in correctly, check the errors below.
                                </div>
                            @endif
                            
                            <div class="col-md-12">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="question_nl">Vraag:</label>
                                    <input class="form-control" type="text" name="question_nl" id="question_nl" value="{{ old('question_nl') }}" required>
                                    @if ($errors->has('question_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('question_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="answer_nl">Antwoord:</label>
                                    <textarea class="form-control" name="answer_nl" id="answer_nl" required>{{ old('answer_nl') }}</textarea>
                                    @if ($errors->has('answer_nl'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('answer_nl') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="question_fr">La question:</label>
                                    <input class="form-control" type="text" name="question_fr" id="question_fr" value="{{ old('question_fr') }}" required>
                                    @if ($errors->has('question_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('question_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="answer_fr">La réponse:</label>
                                    <textarea class="form-control" name="answer_fr" id="answer_fr" required>{{ old('answer_fr') }}</textarea>
                                    @if ($errors->has('answer_fr'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('answer_fr') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="question_en">Question:</label>
                                    <input class="form-control" type="text" name="question_en" id="question_en" value="{{ old('question_en') }}" required>
                                    @if ($errors->has('question_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('question_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <label for="answer_en">Answer:</label>
                                    <textarea class="form-control" name="answer_en" id="answer_en" required>{{ old('answer_en') }}</textarea>
                                    @if ($errors->has('answer_en'))
                                        <span class="error_block">
                                            <strong>*{{ $errors->first('answer_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <h3>This question belongs to:</h3>
                                <div class="col-md-6">
                                    <label>Category:</label>
                                    <select class="form-control" name="category">
                                        <option value="none">No category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="products">
                                        <label>Products:</label>
                                        <div class="row product_select first">
                                            <div class="col-md-9 select">
                                                <select class="form-control" name="product[]">
                                                    <option value="none">No products</option>
                                                    @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="btn btn-danger btn_remove">Remove</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="alert alert-warning no_products">
                                      <strong>Warning!</strong> There are no more products.
                                    </div>
                                    <span class="btn btn-info add_product">Add another product</span>
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
<script src="{{url('js/add_product_to_faq.js')}}"></script>
@endsection