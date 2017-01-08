@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome on the Kowloon dashboard!</p>
                    <p>Here you can manage your:</p>
                    <ul>
                        <li><a href="{{url('/admin/products_overview')}}">Products</a></li>
                        <li><a href="{{url('/admin/set_hot_items')}}">Hot items</a></li>
                        <li><a href="{{url('/admin/faqs_overview')}}">FAQ</a></li>
                        <li><a href="{{url('/admin/subscribers_overview')}}">Subscribers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
