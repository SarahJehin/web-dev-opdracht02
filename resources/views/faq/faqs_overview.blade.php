@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">FAQ's overview</div>

                <div class="panel-body">
                    
                    @if (session('message'))
                       <div class="alert alert-success">
                           {{ session('message') }}
                       </div>
                    @endif
                    
                    <div>
                        <a href="{{url('/admin/add_faq')}}">Add FAQ</a>
                    </div>
                    
                    @if($faqs->isEmpty())
                    <div>
                        No FAQ's found.  Create one by clicking the link above.
                    </div>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{{str_limit($faq->question, 50)}}</td>
                                <td>{{str_limit($faq->answer, 40)}}</td>
                                <td>
                                    <a href="{{url('/admin/edit_faq/' . $faq->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="delete_question" faq_id="{{$faq->id}}"><i class="fa fa-times delete" aria-hidden="true"></i></a>                                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    
                    <div class="alert alert-info delete_alert">
                        <a href="#" class="close" aria-label="close">×</a>
                        <p>Sure you want to delete this question:</p>
                        <p class="question_to_delete"></p>
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