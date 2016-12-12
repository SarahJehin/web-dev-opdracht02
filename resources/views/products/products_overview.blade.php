@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products overview</div>

                <div class="panel-body">
                    
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
                            <td>cat</td>
                            <td>prod</td>
                            <td>price</td>
                        @foreach($products as $product)
                        <div>
                            <td>{{$product->name_nl}}</td>
                            <td>{{$product->name_nl}}</td>
                            <td>{{$product->name_nl}}</td>
                        </div>
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
