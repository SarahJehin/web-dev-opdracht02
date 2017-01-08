@extends('layouts.main_layout')

@section('title', 'Kowloon - FAQ')

@section('content')
<div class="">
    <div class="faq_overlay selected">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <h2>FREQUENTLY ASKED QUESTIONS</h2>
        </div>
        <div class="row search">
            <form method="post" action="{{url(App::getLocale().'/search_faq')}}">
                {{ csrf_field() }}
                <div class="input">
                    <span class="search_icon"></span>
                    <input type="text" name="searchword" id="searchword" placeholder="@lang('welcome.search_faq_placeholder')">
                </div>
                <input type="submit" value="Search" hidden="hidden">
            </form>
        </div>
        <div class="row clear">
            <i class="fa fa-window-close-o" aria-hidden="true"></i><span> @lang('welcome.clear')</span>
        </div>
        <div class="row info">
            <p>@lang('welcome.search_faq_info')</p>
        </div>
        <div class="row results">
            
            @if(isset($searchword))
            <h4>@lang('welcome.results_for') "{{$searchword}}"</h4>
            @endif
            
            @if(!$faqs->isEmpty())
            @foreach($faqs as $faq)
            <div class="questionblock">
                <h4>{{$faq->question}}</h4>
                <div class="answer">
                    {{$faq->answer}}
                </div>
            </div>
            @endforeach
            {{ $faqs->links() }}
            @else
            <div>
                @lang('welcome.no_search_results')
            </div>
            @endif
            
        </div>
    </div>
</div>
</div>
@endsection
