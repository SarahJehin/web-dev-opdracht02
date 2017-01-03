<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose you language</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="{{url('/css/main.css')}}" rel="stylesheet">
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/images/favicon/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/images/favicon/favicon-96x96.png')}}">
</head>
<body>
    
</body>
</html>
<div class="content landing">
   
    <div class="col-md-12 header_product_detail">
        <div class="kowloon_logo">
            <a href="{{url(App::getLocale().'/')}}"><img src="{{url('images/kowloon_logo_full.png')}}" alt="kowloon logo"></a>
        </div>
    </div>
    
    <div class="row page_content">
        <div class="language_box">
            <a href="{{url('/choose_lang/nl')}}">Ga verder in het Nederlands</a>
            <a href="{{url('/choose_lang/fr')}}">Continuez en français</a>
            <a href="{{url('/choose_lang/en')}}">Continue in English</a>
        </div>
    </div>
</div>