@extends('layouts.main_layout')

@section('content')
<div class="">
    <div class="col-md-12 header_img">
        <img src="{{url('/images/header_about_us.jpg')}}" alt="header image">
        <div class="kowloon_logo">
            <a href="{{url('/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="col-md-10 col-md-offset-1">
            <div class="row breadcrumbs">
                Kowloon > about us
            </div>
            
            <div class="row">
                <h1>About us</h1>
            </div>
            
            <div class="row">
                <div class="col-md-10">
                    <h3>Kowloon</h3>
                    <div>
                        Pet concept, active since ...
                    </div>
                </div>
                <div class="col-md-2 contact">
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
                <h3>Leave us a message</h3>
            </div>
            
            <div class="row">
                <form method="post" action="#">
                    <div>
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="name@domain.com">
                    </div>
                    <div>
                        <label for="message">Your message</label>
                        <textarea name="message" id="message" placeholder="Write your message here."></textarea>
                    </div>
                    <input type="submit" value="Send">
                </form>
            </div>
            
            <div class="row">
                <h3>Frequently asked questions</h3>
            </div>
            
            <div class="faqs">
                <div class="row">
                    <div class="questions">
                        <h4>Dit is een vraag</h4>
                    </div>
                    <div class="answer">
                        Dit is het antwoord op de vraag en mag dus enkel zichtbaar zijn als de vraag is opengeklapt.
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
