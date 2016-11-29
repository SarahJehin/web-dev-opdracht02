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
        <label for="hamburger">Hamburger</label>
        
        <div class="side_nav">
            
            
            <nav>
                <div class="general">
                    <ul>
                        <li>Search</li>
                        <li>FAQ</li>
                        <li>About us</li>
                    </ul>
                </div>
                
                <div class="categories">
                    <ul>
                        <li><a href="#"><img src="{{url('/images/icons/nav_dog.png')}}"><span>Dogs</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/nav_cat.png')}}"><span>Cats</span></a></li>
                        <li><a href="#"><img src="{{url('/images/icons/nav_fish.png')}}"><span>Fish</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        

        <div class="content">
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{url('/js/app.js')}}"></script>
    @yield('custom_js')
</body>
</html>
