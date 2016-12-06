@extends('layouts.main_layout')

@section('content')
<div class="">
    @include('sub_views.header')
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                Kowloon dogs - splash 'n fun
            </div>
            
            <div class="row">
                <h1>Dogs articles</h1>
            </div>
            
            <div class="row filter">
                Filter met openklap menu
                <div class="col-md-11 col-md-offset-1">
                    <div class="row">
                        by collection
                        <form>
                            <input type="checkbox" value="1" id="1"><label for="1">Splash 'n fun</label>
                            <input type="checkbox" value="2" id="2"><label for="2">Luxury</label>
                        </form>
                    </div>
                    <div class="row">
                        price range
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
                    </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
