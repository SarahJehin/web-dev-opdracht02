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
                                    <a href="#" class="delete_product" product_id="{{$product->id}}"><i class="fa fa-times delete" aria-hidden="true"></i></a>                                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    
                    <div class="alert alert-info delete_alert">
                        <a href="#" class="close" aria-label="close">×</a>
                        <p>Sure you want to delete this product:</p>
                        <p class="product_to_delete"></p>
                        <a href="#" class="btn btn-info" role="button">Yes, delete!</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!};
</script>
<script src="{{url('js/admin.js')}}"></script>
@endsection