<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="{{url('/css/main.css')}}" rel="stylesheet">
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
        
        
        <input type="checkbox" name="hamburger" id="hamburger">
        <label for="hamburger"><span class="hamburger"></span></label>
        
        <div class="side_nav">
            
            
            <nav>
                <div class="general">
                    <ul>
                        <li><a href="#"><span class="search"></span><span class="text">Search</span></a></li>
                        <li><a href="#" class="faq_link"><span class="faq"></span><span class="text">FAQ</span></a></li>
                        <li><a href="{{url('about_us')}}"><span class="about_us"></span><span class="text">Contact</span></a></li>
                    </ul>
                </div>
                
                <div class="categories">
                    <ul>
                        <!--
                        <li><a href="#"><span class="dogs_icon"></span><span class="text">Dogs</span></a></li>
                        <li><a href="#"><span class="cats_icon"></span><span class="text">Cats</span></a></li>
                        <li><a href="#"><span class="fish_icon"></span><span class="text">Fish</span></a></li>
                        <li><a href="#"><span class="birds_icon"></span><span class="text">Birds</span></a></li>
                        <li><a href="#"><span class="small_animals_icon"></span><span class="text">Small animals</span></a></li>
                        -->
                        @foreach($categories as $category)
                        @if($category->name_en != "Other")
                        <li><a href="{{url('/products/' . $category->id)}}"><span class="{{str_replace(' ', '_', strtolower($category->name_en))}}_icon"></span><span class="text">{{$category->name_nl}}</span></a></li>
                        @endif
                        @endforeach
                        <!--
                        <li><a href="#"><img src="{{url('/images/icons/icon_dog.png')}}"><span>Dogs</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/icon_cat.png')}}"><span>Cats</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/icon_fish.png')}}"><span>Fish</span></a></li>
                        -->
                    </ul>
                </div>
            </nav>
            
            <div class="logo">
                <a href="{{url('/')}}"></a>
            </div>
            
        </div>
        

        <div class="content">
            @include('sub_views.faq_overlay')
            
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="{{url('/js/app.js')}}"></script>
    <script src="{{url('/js/side_nav.js')}}"></script>
    @yield('custom_js')
</body>
</html>
