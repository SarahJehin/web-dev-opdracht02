@extends('layouts.main_layout')

@section('content')
<div class="">
    @include('sub_views.header')
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 intro">
                @if(App::isLocale('nl'))
                 NL (Nederlands) - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique tincidunt elit ut elementum. Nulla lectus purus, ullamcorper placerat elementum ut, venenatis ac tortor. Sed fermentum velit at metus blandit vehicula. Integer sed metus sit amet risus iaculis pharetra at nec nunc.
                @elseif(App::isLocale('fr'))
                FR (Français) - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique tincidunt elit ut elementum. Nulla lectus purus, ullamcorper placerat elementum ut, venenatis ac tortor. Sed fermentum velit at metus blandit vehicula. Integer sed metus sit amet risus iaculis pharetra at nec nunc.
                @elseif(App::isLocale('en'))
                EN (English) - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique tincidunt elit ut elementum. Nulla lectus purus, ullamcorper placerat elementum ut, venenatis ac tortor. Sed fermentum velit at metus blandit vehicula. Integer sed metus sit amet risus iaculis pharetra at nec nunc.
                @endif
            </div>
        </div>
        <div class="row categories">
            <div class="col-md-12">
                
                <div>
                    @foreach($categories as $category)
                    <?php $name = 'name_' . App::getLocale() ?>
                    <div class="col-md-2 category">
                        <a href="{{url('products/' . $category->id)}}">
                            <div class="cat_{{str_replace(' ', '_', strtolower($category->name_en))}}"></div>
                            <div>{{strtoupper($category->$name)}}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <!--
                <div class="col-md-2 category">
                    <div class="cat_dogs"></div>
                    <div>DOGS</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_cats"></div>
                    <div>CATS</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_fish"></div>
                    <div>FISH</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_birds"></div>
                    <div>BIRDS</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_small_animals"></div>
                    <div>SMALL ANIMALS</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_other"></div>
                    <div>OTHER</div>
                </div>
                -->
            </div>
        </div>
        
        <div class="row hot_items">
            <div class="col-md-12">
                    <div><h1>Hot items.</h1></div>

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
        
        <div class="row">
            <div class="col-md-12 visit_store">
                <a href="#">Visit the store</a>
            </div>
        </div>
        
        <div class="row bottom">
            <div class="col-md-8 deals">
                <div class="col-md-8 col-md-offset-2">
                    discover amazing Kowloon deals!
                </div>
                <div class="col-md-6 col-md-offset-3">
                    only in our newsletter
                </div>
            </div>
            <div class="col-md-4 newsletter">
                <h3>Subscribe to our newsletter</h3>
                <div>Lorem ipsum dolor sit amet.</div>
                <div>
                    <form method="post" action="#">
                        {{ csrf_field() }}
                        <div>
                            <input type="email" name="email" placeholder="Name@domain.com">
                            <input type="submit" value="OK">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
