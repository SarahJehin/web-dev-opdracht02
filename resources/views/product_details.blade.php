@extends('layouts.main_layout')

@section('content')
<div class="">
   
    <div class="col-md-12 header_product_detail">
        <div class="kowloon_logo">
            <a href="{{url(App::getLocale().'/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row product">
                <div class="col-md-6 images">
                    <div class="col-md-12 big_img">
                        <img src="{{url('/images/products/' . $product->images[0]->image_path)}}" alt="{{$product->name_en}}">
                    </div>
                    <div class="small_images">
                        @foreach($product->images as $image)
                        <div class="small_img">
                            <img src="{{url('/images/products/' . $image->image_path)}}" alt="{{$product->name_en}}">
                        </div>
                        @endforeach
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
            
            @if(!$related_products->isEmpty())
            <div class="row related_products">
                <div class="items">
                        @foreach($related_products as $related_product)
                        <div class="hot_item">
                            <a href="{{url(App::getLocale().'/product_details/' . $related_product->id)}}">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/' . $related_product->images[0]->image_path)}}" alt="{{$related_product->name}}">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
            
            <div class="row view_more">
                <a href="#">@lang('products.view_more')</a>
            </div>
            @else
            <div>
                No related products found...
            </div>
            @endif
            
            <h3>@lang('about_us.faq')</h3>
            
            @if(!$faqs->isEmpty())
            <div class="row faqs">
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
            </div>
            
            <div class="row more_questions">
                <a href="#">@lang('products.more_questions')</a>
            </div>
            @else
            <div>
                No questions found...
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection