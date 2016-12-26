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
                        <h1>{{$product->name}}</h1>
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
                            {{$product->description}}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row specifications">
                <h4>@lang('products.product_title03')</h4>
                @foreach($specifications as $specification)
                <div class="spec">
                    <h5>{{strtoupper($specification->title)}}</h5>
                    <div class="spec_desc">
                        {{$specification->description}}
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
                @if(!$faqs->isEmpty())
                @foreach($faqs as $faq)
                <div class="row questionblock">
                    <div type="button" class="question collapsed" data-toggle="collapse" data-target="#question{{$faq->id}}">
                        <h4>{{ $faq->question }}</h4>
                        <span class="arrow"></span>
                    </div>
                    <div id="question{{$faq->id}}" class="collapse answer">
                        {{ $faq->answer }}
                    </div>
                </div>
                @endforeach
                @else
                <div>
                    No questions found...
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
@endsection