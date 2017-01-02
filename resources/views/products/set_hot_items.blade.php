@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Set hot items</div>

                <div class="panel-body">
                   
                   @if (session('message'))
                       <div class="alert alert-success">
                           {{ session('message') }}
                       </div>
                   @endif
                    
                    <div class="row">
                        <form method="post" action="{{url('/admin/set_hot_items')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <h3>Hot items</h3>
                                <div class="col-md-12 item">
                                    <div class="col-md-1">
                                        <label for="hot_item1">1:</label>
                                    </div>
                                    <div class="col-md-11">
                                        <select class="form-control" name="hot_item[]" id="hot_item1">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" <?php if(!$hot_items->isEmpty() && $product->id == $hot_items[0]->product->id) echo("selected") ?>>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 item">
                                    <div class="col-md-1">
                                        <label for="hot_item2">2:</label>
                                    </div>
                                    <div class="col-md-11">
                                        <select class="form-control" name="hot_item[]" id="hot_item2">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" <?php if(!$hot_items->isEmpty() && $product->id == $hot_items[1]->product->id) echo("selected") ?>>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 item">
                                    <div class="col-md-1">
                                        <label for="hot_item3">3:</label>
                                    </div>
                                    <div class="col-md-11">
                                        <select class="form-control" name="hot_item[]" id="hot_item3">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" <?php if(!$hot_items->isEmpty() && $product->id == $hot_items[2]->product->id) echo("selected") ?>>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 item">
                                    <div class="col-md-1">
                                        <label for="hot_item4">4:</label>
                                    </div>
                                    <div class="col-md-11">
                                        <select class="form-control" name="hot_item[]" id="hot_item4">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}" <?php if(!$hot_items->isEmpty() && $product->id == $hot_items[3]->product->id) echo("selected") ?>>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
@endsection