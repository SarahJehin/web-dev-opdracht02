<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <meta name="description" content="@lang('welcome.meta_description')">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="{{url('/css/main.min.css')}}" rel="stylesheet">
    @yield('custom_css')
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/favicon/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/images/favicon/favicon-96x96.png')}}">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        
        @if (!Request::cookie('client_ip'))
        <div class="cookies">
            <div class="left">
                <img src="{{url('/images/cookie_img.png')}}" alt="cookie bone">
            </div>
            <div class="right">
                <h3>Cookies</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                </p>
                <div>
                    <a href="{{url(App::getLocale().'/set_cookie')}}">ok, verder surfen</a>
                </div>
            </div>
            <div class="close_tag">
                <a href="{{url(App::getLocale().'/set_cookie')}}">X</a>
            </div>
        </div>
        @endif
        
        <input type="checkbox" name="hamburger" id="hamburger">
        <label for="hamburger"><span class="hamburger"></span></label>
        
        <div class="side_nav">
            <nav>
                <div class="general">
                    <ul>
                        <li><a href="{{url(App::getLocale().'/search')}}" class="{{ (Route::getCurrentRoute()->getPath() == '{language}/search') ? 'active' : '' }}"><span class="search"></span><span class="text">Search</span></a></li>
                        <li><a href="{{url(App::getLocale().'/faq')}}" class="faq_link {{ (Route::getCurrentRoute()->getPath() == '{language}/faq') ? 'active' : '' }}"><span class="faq"></span><span class="text">FAQ</span></a></li>
                        <li><a href="{{url(App::getLocale().'/about_us')}}" class="{{ (Route::getCurrentRoute()->getPath() == '{language}/about_us') ? 'active' : '' }}"><span class="about_us"></span><span class="text">Contact</span></a></li>
                    </ul>
                </div>
                
                <div class="categories">
                    <ul>
                        @foreach($categories as $category)
                        @if($category->name_en != "Other")
                        <li><a href="{{url(App::getLocale().'/category/' . $category->id . '/' . str_replace(' ', '_', $category->name))}}" class="{{ (Route::current()->getParameter('category') == $category->name) ? 'active' : '' }}"><span class="{{str_replace(' ', '_', strtolower($category->name_en))}}_icon"></span><span class="text">{{$category->name}}</span></a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </nav>
            
            <div class="logo">
                <a href="{{url(App::getLocale().'/')}}"></a>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{url('/js/app.js')}}"></script>
    <script src="{{url('/js/side_nav.js')}}"></script>
    <script src="{{url('/js/main.js')}}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-90260857-1', 'auto');
      ga('send', 'pageview');

    </script>
    @yield('custom_js')
</body>
</html>
