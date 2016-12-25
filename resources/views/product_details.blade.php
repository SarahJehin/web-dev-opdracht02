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
                <div class="col-md-6 images">
                    <div class="col-md-12 big_img">
                        <img src="{{url('/images/products/' . $product->images[0]->image_path)}}" alt="{{$product->category->name_nl}}">
                    </div>
                    @foreach($product->images as $image)
                    <div class="col-md-4 small_img">
                        <img src="{{url('/images/products/' . $image->image_path)}}" alt="{{$product->name_en}}">
                    </div>
                    @endforeach
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
                        <h4>@lang('products.product_title01')</h4>
                        <div class="colors">
                            @foreach($product->colors as $color)
                            <div class="color_bullet" style="background-color:{{$color->hexcode}}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <h4>@lang('products.product_title02')</h4>
                        <div>
                            {{$product->description_nl}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row specifications">
                <h4>@lang('products.product_title03')</h4>
                @foreach($product->specifications as $specification)
                <div class="spec">
                    <h5>{{strtoupper($specification->title_nl)}}</h5>
                    <div class="spec_desc">
                        {{$specification->description_nl}}
                    </div>
                </div>
                @endforeach
            </div>
            
            <h3>@lang('products.subtitle01')</h3>
            
            <div class="row related_products">
                blab
            </div>
            
            <h3>@lang('about_us.faq')</h3>
            
            <div class="row faqs">
                <div class="row questionblock">
                    <div type="button" class="question collapsed" data-toggle="collapse" data-target="#demo1">
                        <h4>Dit is een vraag</h4>
                        <span class="arrow"></span>
                    </div>
                    <div id="demo1" class="collapse answer">
                        Dit is het antwoord op de vraag en mag dus enkel zichtbaar zijn als de vraag is opengeklapt.
                    </div>
                </div>
                <div class="row questionblock">
                    <div type="button" class="question collapsed" data-toggle="collapse" data-target="#demo2">
                        <h4>Dit is een vraag</h4>
                        <span class="arrow"></span>
                    </div>
                    <div id="demo2" class="collapse answer">
                        Dit is het antwoord op de vraag en mag dus enkel zichtbaar zijn als de vraag is opengeklapt.
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection