@extends('layouts.main_layout')

@section('title', 'Kowloon - Zoek je product')

@section('content')
<div class="">
    <div class="row searchpage">
    <div class="col-md-10 col-md-offset-1">
        
        <form method="post" action="{{url(App::getLocale().'/search_products')}}">
        <div class="row filter">
            <div type="button" class="question collapsed title" data-toggle="collapse" data-target="#filters">
                <span class="text">@lang('welcome.advanced_filter')</span>
                <span class="arrow"></span>
            </div>
            <div id="filters" class="row collapse">
                <div class="col-md-6">
                    <h4>@lang('welcome.category')</h4>
                    @foreach($categories as $category)
                    <input name="category[]" type="checkbox" value="{{$category->id}}" id="{{$category->id}}"><label for="{{$category->id}}">{{$category->name}}</label>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h4>@lang('products.price_range')</h4>
                    <label for="from">@lang('products.between'):</label>
                    <input type="number" id="from" name="from" min="1">
                    <label for="from">@lang('products.and'):</label>
                    <input type="number" id="to" name="to" min="1">
                </div>
            </div>
        </div>
        
        <div class="row search">
            {{ csrf_field() }}
            <div class="input">
                <span class="search_icon"></span>
                <input type="text" name="searchword" id="searchword" placeholder="@lang('welcome.search_products_placeholder')">
            </div>
            <input type="submit" value="Search" hidden="hidden">
        </div>
        </form>
        <div class="row clear">
            <i class="fa fa-window-close-o" aria-hidden="true"></i><span> @lang('welcome.clear')</span>
        </div>
        <div class="row info">
            <p>@lang('welcome.search_info')</p>
        </div>
        <div class="row results">
            
            @if(isset($searchword))
            <h4>@lang('welcome.results_for') "{{$searchword}}"</h4>
            @endif
            
            @if(isset($product_results))
            @if(!$product_results->isEmpty())
            @foreach($product_results as $product_result)
            <div class="row productblock">
                <div class="col-md-2 image">
                    <img src="{{url('/images/products/' . $product_result->images[0]->image_path)}}" alt="{{$product_result->name}}">
                </div>
                <div class="col-md-10">
                    <h4><a href="{{url(App::getLocale().'/product_details/' . $product_result->id)}}">{{$product_result->name}}</a></h4>
                    <p>
                        {{$product_result->description}}
                    </p>
                </div>
                
            </div>
            @endforeach
            {{ $product_results->links() }}
            @else
            <div>
                @lang('welcome.no_search_results')
            </div>
            @endif
            @endif
            
        </div>
    </div>
</div>
</div>
@endsection
