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
                        <li><a href="#"><span class="faq"></span><span class="text">FAQ</span></a></li>
                        <li><a href="#"><span class="about_us"></span><span class="text">About us</span></a></li>
                    </ul>
                </div>
                
                <div class="categories">
                    <ul>
                        <li><a href="#"><span class="dog_icon"></span><span class="text">Dogs</span></a></li>
                        <li><a href="#"><span class="cat_icon"></span><span class="text">Cats</span></a></li>
                        <li><a href="#"><span class="fish_icon"></span><span class="text">Fish</span></a></li>
                        <li><a href="#"><span class="bird_icon"></span><span class="text">Birds</span></a></li>
                        <li><a href="#"><span class="hamster_icon"></span><span class="text">Small animals</span></a></li>
                        <!--
                        <li><a href="#"><img src="{{url('/images/icons/icon_dog.png')}}"><span>Dogs</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/icon_cat.png')}}"><span>Cats</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/icon_fish.png')}}"><span>Fish</span></a></li>
                        -->
                    </ul>
                </div>
            </nav>
        </div>
        

        <div class="content">
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
