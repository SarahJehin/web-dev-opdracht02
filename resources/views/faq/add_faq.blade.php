@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add FAQ</div>

                <div class="panel-body">
                    
                    <div>
                        <form method="post" action="{{url('/admin/add_faq')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <h3>Nederlands</h3>
                                <div>
                                    <label for="question_nl">Vraag:</label>
                                    <input class="form-control" type="text" name="question_nl" id="question_nl" required>
                                </div>
                                <div>
                                    <label for="answer_nl">Antwoord:</label>
                                    <textarea class="form-control" name="answer_nl" id="answer_nl" required></textarea>
                                </div>

                                <h3>Français</h3>
                                <div>
                                    <label for="question_fr">La question:</label>
                                    <input class="form-control" type="text" name="question_fr" id="question_fr" required>
                                </div>
                                <div>
                                    <label for="answer_fr">La réponse:</label>
                                    <textarea class="form-control" name="answer_fr" id="answer_fr" required></textarea>
                                </div>

                                <h3>English</h3>
                                <div>
                                    <label for="question_en">Question:</label>
                                    <input class="form-control" type="text" name="question_en" id="question_en" required>
                                </div>
                                <div>
                                    <label for="answer_en">Answer:</label>
                                    <textarea class="form-control" name="answer_en" id="answer_en" required></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <input class="btn btn-success" type="submit" value="Opslagen">
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
