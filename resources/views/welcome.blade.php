@extends('layouts.main_layout')

@section('content')
<div class="">
    <div class="row header">
        <!--
        <div class="col-md-12 header_img">
            <img src="{{url('/images/header_dog01.jpg')}}" alt="header image">
            <div class="overlay"></div>
        </div>
        -->
        
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide header_slider" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="{{url('/images/header_dog01.jpg')}}" alt="01">
                    </div>

                    <div class="item">
                      <img src="{{url('/images/header_dog02.jpg')}}" alt="02">
                    </div>

                    <div class="item">
                      <img src="{{url('/images/header_dog03.jpg')}}" alt="03">
                    </div>
                    
                    <div class="overlay"></div>
                  </div>

                </div>
        </div>
        
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 intro">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique tincidunt elit ut elementum. Nulla lectus purus, ullamcorper placerat elementum ut, venenatis ac tortor. Sed fermentum velit at metus blandit vehicula. Integer sed metus sit amet risus iaculis pharetra at nec nunc.
            </div>
        </div>
        <div class="row categories">
            <div class="col-md-12">
                
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
                    <div class="cat_hamsters"></div>
                    <div>SMALL ANIMALS</div>
                </div>
                <div class="col-md-2 category">
                    <div class="cat_other"></div>
                    <div>OTHER</div>
                </div>
                
                
                <!--
                <div class="col-md-2 category">
                    <img src="{{url('/images/icons/icon_dog.png')}}" alt="dog">
                    <span>dogs</span>
                </div>
                <div class="col-md-2 category">
                    <img src="{{url('/images/icons/icon_cat.png')}}" alt="dog">
                    <span>cats</span>
                </div>
                <div class="col-md-2 category">
                    <img src="{{url('/images/icons/icon_fish.png')}}" alt="dog">
                    <span>fish</span>
                </div>
                <div class="col-md-2 category">
                    <img src="{{url('/images/icons/icon_bird.png')}}" alt="dog">
                    <span>birds</span>
                </div>
                <div class="col-md-2 category">
                    <img src="{{url('/images/icons/icon_hamster.png')}}" alt="dog">
                    <span>small animals</span>
                </div>
                <div class="col-md-2 category">
                    other
                </div>
                -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hot items.</div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            foto1
                        </div>
                        <div class="col-md-3">
                            foto2
                        </div>
                        <div class="col-md-3">
                            foto3
                        </div>
                        <div class="col-md-3">
                            foto4
                        </div>
                    </div>
                </div>
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
