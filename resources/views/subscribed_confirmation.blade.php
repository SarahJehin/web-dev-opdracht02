@extends('layouts.main_layout')

@section('title')
Kowloon - Subscribed
@endsection

@section('content')
<div class="">
   
    <div class="col-md-12 header_product_detail">
        <div class="kowloon_logo">
            <a href="{{url(App::getLocale().'/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="subscribed_confirmation">
                <p>@lang('welcome.subscriber_message')</p>
                <p><a href="{{url(App::getLocale() . '/')}}">Homepage</a></p>
            </div>
        </div>
    </div>
</div>
@endsection