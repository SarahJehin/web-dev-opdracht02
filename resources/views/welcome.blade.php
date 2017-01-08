@extends('layouts.main_layout')

@section('title')
@lang('welcome.meta_title')
@endsection

@section('content')
<div class="">
    @include('sub_views.header')
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 intro">
                @lang('welcome.intro')
            </div>
        </div>
        <div class="row categories">
            <div class="col-md-12">
                <div>
                    @foreach($categories as $category)
                    <?php $name = 'name_' . App::getLocale() ?>
                    <div class="col-md-2 category">
                        <a href="{{url(App::getLocale().'/category/' . $category->id . '/' . str_replace(' ', '_', $category->name))}}">
                            <div class="cat_{{str_replace(' ', '_', strtolower($category->name_en))}}"></div>
                            <div>{{strtoupper($category->name)}}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="row hot_items">
            <div class="col-md-12">
                    <div><h1>@lang('welcome.subtitle01')</h1></div>
                    <div class="items">
                        @foreach($hot_items as $hot_item)
                        <div class="hot_item">
                            <a href="{{url(App::getLocale().'/product_details/' . $hot_item->product->id . '/' . str_replace(' ', '_', $hot_item->product->name))}}">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('/images/products/' . $hot_item->product->images[0]->image_path)}}" alt="{{$hot_item->product->name}}">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">{{$hot_item->product->name}}</span><span class="price">&euro;{{$hot_item->product->price}}</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 visit_store">
                <a href="#">@lang('welcome.visit_store')</a>
            </div>
        </div>
        
        <div class="row bottom">
            <div class="col-md-8 deals">
                <div class="col-md-8 col-md-offset-2">
                    @lang('welcome.banner_part01')
                </div>
                <div class="col-md-6 col-md-offset-3">
                    @lang('welcome.banner_part02')
                </div>
            </div>
            <div class="col-md-4 newsletter">
                <h3>@lang('welcome.newsletter')</h3>
                <div>@lang('welcome.newsletter_description')</div>
                <div>
                    <form method="post" action="{{url(App::getLocale().'/add_subscriber')}}" novalidate>
                        {{ csrf_field() }}
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Name@domain.com">
                            <input type="submit" value="OK">
                        </div>
                        @if (count($errors) > 0)
                            <div class="subscriber_error">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
