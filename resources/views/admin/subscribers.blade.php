@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Subscribers overview</div>

                <div class="panel-body">
                   
                   @if (session('message'))
                       <div class="alert alert-success">
                           {{ session('message') }}
                       </div>
                   @endif
                    
                    <div class="row">
                        <div class="col-md-12">
                            @if($subscribers->isEmpty())
                        <div>
                            No subscribers exist yet...
                        </div>
                        @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Subscriber mail</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{$subscriber->email}}</td>
                                    <td>
                                        <a href="#" class="delete_subscriber" subscriber_id="{{$subscriber->id}}"><i class="fa fa-times delete" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        
                        <div class="alert alert-info delete_alert">
                            <a href="#" class="close" aria-label="close">×</a>
                            <p>Sure you want to delete this subscriber:</p>
                            <p class="subscriber_to_delete"></p>
                            <a href="#" class="btn btn-info" role="button">Yes, delete!</a>
                        </div>
                        
                        </div>
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