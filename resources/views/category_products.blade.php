@extends('layouts.main_layout')

@section('content')
<div class="">
    @include('sub_views.header')
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                <div class="kowloon_logo"></div>
                <span class="breadcrumb">{{$category->name}}</span>
                <span class="breadcrumb">Splash 'n fun</span>
            </div>
            
            <div class="row">
                <h1>{{$category->name}} @lang('products.articles')</h1>
            </div>
            
            @if(!$products->isEmpty())
            <div class="row filter">
                <div type="button" class="question collapsed title" data-toggle="collapse" data-target="#filters">
                    <span class="text">@lang('products.filter')</span>
                    <span class="arrow"></span>
                </div>
                <div id="filters" class="col-md-11 col-md-offset-1 collapse">
                    <div class="row">
                        <h4>@lang('products.collection')</h4>
                        <form>
                            <input type="checkbox" value="1" id="1"><label for="1">Splash 'n fun</label>
                            <input type="checkbox" value="2" id="2"><label for="2">Luxury</label>
                        </form>
                    </div>
                    <div class="row">
                        <h4>@lang('products.price_range')</h4>
                        <label for="from">@lang('products.between'):</label>
                        <input type="number" id="from" name="from" min="1">
                        <label for="from">@lang('products.and'):</label>
                        <input type="number" id="from" name="from" min="1">
                    </div>
                </div>
            </div>
            
            <div class="row sort">
                <div class="col-md-2">
                    <select>
                        <option disabled selected>@lang('products.select_placeholder')</option>
                        <option>@lang('products.select_option01')</option>
                        <option>@lang('products.select_option02')</option>
                        <option>@lang('products.select_option03')</option>
                        <option>@lang('products.select_option04')</option>
                    </select>
                </div>
                <div class="col-md-2">
                    {{$category->name}} @lang('products.items'): 5 of 56
                </div>
            </div>
            
            <div class="row products">
                <div class="items">
                        @foreach($products as $product)
                        <div class="hot_item">
                            <a href="{{url(App::getLocale().'/product_details/' . $product->id)}}">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/' . $product->images[0]->image_path)}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">{{$product->name}}</span><span class="price">&euro;{{$product->price}}</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                        {{ $products->links() }}
                </div>
            </div>
            @else
            <div class="row nothing_available">
                Sorry, no products available
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
