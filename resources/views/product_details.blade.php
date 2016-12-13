@extends('layouts.main_layout')

@section('content')
<div class="">
   
    <div class="col-md-12 header_product_detail">
        <div class="kowloon_logo">
            <a href="{{url('/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row product">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <img src="{{url('/images/products/' . $product->images[0]->image_path)}}" alt="{{$product->category->name_nl}}">
                    </div>
                    <div class="col-md-4">
                        kleine foto 1
                    </div>
                    <div class="col-md-4">
                        kleine foto 2
                    </div>
                    <div class="col-md-4">
                        kleine foto 3
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row breadcrumbs">
                        <div class="kowloon_logo"></div>
                        <span class="breadcrumb">{{$product->category->name_nl}}</span>
                        <span class="breadcrumb">Splash 'n fun</span>
                    </div>
                    <div class="row">
                        <h1>{{$product->name_nl}}</h1>
                        <h3>&euro; {{ $product->price }}</h3>
                    </div>
                    <div class="row">
                        <h4>Colors</h4>
                        <div>
                            @foreach($product->colors as $color)
                            <div>{{$color->hexcode}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <h4>Beschrijving</h4>
                        <div>
                            {{$product->description_nl}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h4>Specifications</h4>
                @foreach($product->specifications as $specification)
                <div>
                    <h5>{{strtoupper($specification->title_nl)}}</h5>
                    <div>
                        {{$specification->description_nl}}
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection