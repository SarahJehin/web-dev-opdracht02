@extends('layouts.main_layout')

@section('content')
<div class="">
    <div class="col-md-12 header_img">
        <img src="{{url('/images/header_about_us.jpg')}}" alt="header image">
        <div class="kowloon_logo">
            <a href="{{url(App::getLocale().'/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                <a href="{{url(App::getLocale().'/')}}"><div class="kowloon_logo"></div></a>
                <span class="breadcrumb">@lang('about_us.title')</span>
            </div>
            
            <div class="row">
                <h1>@lang('about_us.title')</h1>
            </div>
            
            <div class="row">
                <div class="col-md-9 about_us">
                    <h3>Kowloon</h3>
                    <div>
                        @lang('about_us.text')
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 contact">
                    <h3>Contact</h3>
                    <div>
                        <ul>
                            <li>Decks Johan</li>
                            <li>Bosdreef 7</li>
                            <li>2200 Herentals</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h3>@lang('about_us.subtitle01')</h3>
            </div>
            
            <div class="row contact_form">
                <form method="post" action="#">
                    <div>
                        <label for="email">@lang('about_us.label01')</label>
                        <input type="email" name="email" id="email" placeholder="name@domain.com">
                    </div>
                    <div>
                        <label for="message">@lang('about_us.label02')</label>
                        <textarea name="message" id="message" placeholder="@lang('about_us.placeholder02')"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="@lang('about_us.submit_value')">
                    </div>
                </form>
            </div>
            
            <div class="row">
                <h3>@lang('about_us.faq')</h3>
            </div>
            
            <div class="faqs">
                @if(!$faqs->isEmpty())
                @foreach($faqs as $faq)
                <div class="row questionblock">
                    <div type="button" class="question collapsed" data-toggle="collapse" data-target="#question{{$faq->id}}">
                        <h4>{{ $faq->question }}</h4>
                        <span class="arrow"></span>
                    </div>
                    <div id="question{{$faq->id}}" class="collapse answer">
                        {{ $faq->answer }}
                    </div>
                </div>
                @endforeach
                @else 
                <div>
                    There are no questions yet
                </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
@endsection
