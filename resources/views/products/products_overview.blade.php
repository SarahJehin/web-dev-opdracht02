@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Products overview</div>

                <div class="panel-body">
                    
                    <div>
                        <a href="{{url('/admin/add_product')}}">Product toevoegen</a>
                    </div>
                    
                    @if($products->isEmpty())
                    <div>
                        No products found!
                    </div>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Categorie</th>
                                <th>Product</th>
                                <th>Prijs</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <?php $name = 'name_' . App::getLocale(); ?>
                            <tr>
                                <td>{{$product->category->$name}}</td>
                                <td>{{$product->$name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="{{url('/admin/edit_product/' . $product->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-times delete" aria-hidden="true"></i></a>                                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
