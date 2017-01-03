<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - not found</title>
    <style>
        body {
            font-family: "Calibri", sans-serif;
            background-color: #454545;
            color: #fff;
        }
        .content {
            width: 500px;
            margin: 0 auto;
        }
        h2 {
            color: orange;
        }
        a {
            color: #fff;
        }
        a:hover {
            color: orange;
        }
    </style>
</head>
<body>
    <div class="content">
   
        <div class="col-md-12 header_product_detail">
            <div class="kowloon_logo">
                <a href="{{url(App::getLocale().'/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
            </div>
        </div>

        <div class="row page_content">
            <h2>404 Not Found</h2>
            <p>Sorry, it seems like this page doesn't exist...</p>
            <p>If you think this is a missing link in the site, please <a href="{{url(App::getLocale().'/about_us')}}">contact us</a>.</p>
            <p>Hopefully you'll find what you need on one of the pages below:</p>
            <ul>
                <li><a href="{{url(App::getLocale().'/')}}">Home</a></li>
                <li><a href="{{url(App::getLocale().'/')}}">Search</a></li>
                <li><a href="{{url(App::getLocale().'/')}}">Contact</a></li>
                <li>
                    Categories
                    <ul>
                        <!-- voor onderstaande eerst de categories variabele beschikbaar maken in alle views -->
                        {{--<li><a href="{{url(App::getLocale().'/products/' . $category->id)}}">{{$category->name}}</a></li>--}}
                        <li><a href="{{url(App::getLocale().'/products/1')}}">Dogs</a></li>
                        <li><a href="{{url(App::getLocale().'/products/2')}}">Cats</a></li>
                        <li><a href="{{url(App::getLocale().'/products/3')}}">Fish</a></li>
                        <li><a href="{{url(App::getLocale().'/products/4')}}">Birds</a></li>
                        <li><a href="{{url(App::getLocale().'/products/5')}}">Small animals</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
