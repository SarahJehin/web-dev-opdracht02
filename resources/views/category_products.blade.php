@extends('layouts.main_layout')

@section('title')
Kowloon - {{$category->name}}
@endsection

@section('content')
<div class="">
    @include('sub_views.header')
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                <a href="{{url(App::getLocale().'/')}}"><div class="kowloon_logo"></div></a>
                <a href="{{url(App::getLocale().'/category/' . $category->id . '/' . str_replace(' ', '_', $category->name))}}"><span class="breadcrumb"><span class="dot_{{str_replace(' ', '_', strtolower($category->name_en))}}"></span><span class="category_name">{{$category->name}}</span></span></a>
            </div>
            
            <div class="row">
                <h1>{{$category->name}} @lang('products.articles')</h1>
            </div>
            
            <div class="row">
            <form class="product_filter" method="post" action="{{url(App::getLocale().'/products_filter')}}" novalidate>
            {{ csrf_field() }}
            <div class="row filter">
                <div type="button" class="question collapsed title" data-toggle="collapse" data-target="#filters">
                    <span class="text">@lang('products.filter')</span>
                    <span class="arrow"></span>
                </div>
                <div id="filters" class="col-md-11 col-md-offset-1 collapse">
                    <div class="row">
                        <h4>@lang('products.collection')</h4>
                        @foreach($collections as $collection)
                        <input name="collection[]" type="checkbox" value="{{$collection->id}}" id="{{$collection->id}}"><label for="{{$collection->id}}">{{$collection->name}}</label>
                        @endforeach
                    </div>
                    <div class="row">
                        <h4>@lang('products.price_range')</h4>
                        <label for="from">@lang('products.between'):</label>
                        <input type="number" id="from" name="from" min="1">
                        <label for="to">@lang('products.and'):</label>
                        <input type="number" id="to" name="to" min="1">
                    </div>
                    @if ($errors->has('from') || $errors->has('to'))
                        <div class="error_block">
                           @foreach ($errors->all() as $error)
                               <strong>* {{ $error }}</strong>
                           @endforeach
                        </div>
                    @endif
                    <div class="row">
                        *Press enter to apply filter
                    </div>
                    <div>
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <input type="submit" value="Filter" hidden="hidden">
                    </div>
                </div>
            </div>
            
            <div class="row sort">
                <div>
                    <select name="sort" onchange="this.form.submit()">
                        <option selected value="none">@lang('products.select_placeholder')</option>
                        <option value="low_high">@lang('products.select_option01')</option>
                        <option value="high_low">@lang('products.select_option02')</option>
                        <option value="latest">@lang('products.select_option03')</option>
                        <option value="oldest">@lang('products.select_option04')</option>
                    </select>
                </div>
                <div class="col-md-6 result_amount">
                    {{$category->name}} @lang('products.items'): <strong>{{$products->count()*$products->currentPage()}} of {{$products->total()}}</strong>
                </div>
            </div>
            </form>
            </div>
            
            @if(!$products->isEmpty())
            <div class="row products">
                <div class="col-md-12 items">
                        @foreach($products as $product)
                        <div class="item">
                            <a href="{{url(App::getLocale().'/product_details/' . $product->id. '/' . str_replace(' ', '_', $product->name))}}">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/' . $product->images[0]->image_path)}}" alt="{{$product->name}}">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">{{$product->name}}</span><span class="price">&euro;{{ number_format((float)$product->price, 2, '.', '') }}</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                        <div class="col-md-12 pagination_block">
                            {{ $products->links() }}
                        </div>
                </div>
            </div>
            @else
            <div class="row nothing_available">
                @lang('products.no_filter_results')
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
