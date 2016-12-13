@extends('layouts.main_layout')

@section('content')
<div class="">
    @include('sub_views.header')
    
    <?php $name = 'name_' . App::getLocale(); ?>
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                <div class="kowloon_logo"></div>
                <span class="breadcrumb">{{$category->$name}}</span>
                <span class="breadcrumb">Splash 'n fun</span>
            </div>
            
            <div class="row">
                <h1>{{$category->$name}} articles</h1>
            </div>
            
            <div class="row filter">
                <div type="button" class="question collapsed title" data-toggle="collapse" data-target="#filters">
                    <span class="text">Filter</span>
                    <span class="arrow"></span>
                </div>
                <div id="filters" class="col-md-11 col-md-offset-1 collapse">
                    <div class="row">
                        <h4>By collection</h4>
                        <form>
                            <input type="checkbox" value="1" id="1"><label for="1">Splash 'n fun</label>
                            <input type="checkbox" value="2" id="2"><label for="2">Luxury</label>
                        </form>
                    </div>
                    <div class="row">
                        <h4>price range</h4>
                        <label for="from">between:</label>
                        <input type="number" id="from" name="from" min="1">
                        <label for="from">and:</label>
                        <input type="number" id="from" name="from" min="1">
                    </div>
                </div>
            </div>
            
            <div class="row sort">
                <div class="col-md-2">
                    <select>
                        <option disabled selected>Sort by relevance</option>
                        <option>Price: low to high</option>
                        <option>Price: high to low</option>
                        <option>Latest</option>
                        <option>Oldest</option>
                    </select>
                </div>
                <div class="col-md-2">
                    Dog items: 5 of 56
                </div>
            </div>
            
            <div class="row products">
                <div class="items">
                        <div class="hot_item">
                            <a href="#">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/cooling_mat.jpg')}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">Cooling mat</span><span class="price">&euro;15,49</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="hot_item">
                            <a href="#">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/cooling_mat.jpg')}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">Cooling mat</span><span class="price">&euro;15,49</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="hot_item">
                            <a href="#">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/cooling_mat.jpg')}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">Cooling mat</span><span class="price">&euro;15,49</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="hot_item">
                            <a href="#">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/cooling_mat.jpg')}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">Cooling mat</span><span class="price">&euro;15,49</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        @foreach($category->products as $product)
                        <div class="hot_item">
                            <a href="{{url('/product_details/' . $product->id)}}">
                                <figure>
                                     <div class="img">
                                         <img src="{{url('images/products/' . $product->images[0]->image_path)}}" alt="cooling_mat">
                                         <div class="overlay"></div>
                                         <div class="overlay_icon"><span>View details</span></div>
                                     </div>
                                     <figcaption><span class="title">{{$product->$name}}</span><span class="price">&euro;{{$product->price}}</span></figcaption>
                                </figure>
                            </a>
                        </div>
                        @endforeach
                    </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
