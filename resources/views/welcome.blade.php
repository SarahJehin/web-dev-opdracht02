@extends('layouts.main_layout')

@section('content')
<div class="">
    <div class="row header">
        <div class="col-md-12 header_img">
            <img src="{{url('/images/header_dog01.jpg')}}" alt="header image">
            <div class="overlay"></div>
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
                    dogs
                </div>
                <div class="col-md-2 category">
                    cats
                </div>
                <div class="col-md-2 category">
                    fish
                </div>
                <div class="col-md-2 category">
                    birds
                </div>
                <div class="col-md-2 category">
                    small animals
                </div>
                <div class="col-md-2 category">
                    other
                </div>
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
                discover amazing kowloon deals
            </div>
            <div class="col-md-4">
                subscribe to our newsletter
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
