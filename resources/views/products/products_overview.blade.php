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
                    <table>
                        <thead>
                            <tr>
                                <th>Categorie</th>
                                <th>Product</th>
                                <th>Prijs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cat</td>
                                <td>prod</td>
                                <td>price</td>
                            </tr>
                            
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->category->name_nl}}</td>
                                <td>{{$product->name_nl}}</td>
                                <td>{{$product->price}}</td>
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
