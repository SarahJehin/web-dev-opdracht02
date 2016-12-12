@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add product</div>

                <div class="panel-body">
                    
                    <div>
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div>
                                <label for="name_nl">Naam (NL):</label>
                                <input type="text" name="name_nl" id="name_nl" required>
                            </div>
                            <div>
                                <label for="name_fr">Nom:</label>
                                <input type="text" name="name_fr" id="name_fr" required>
                            </div>
                            <div>
                                <label for="name_en">Name:</label>
                                <input type="text" name="name_en" id="name_en" required>
                            </div>
                            
                            <div>
                                <label for="description_nl">Beschrijving:</label>
                                <textarea name="description_nl" id="description_nl"></textarea>
                            </div>
                            <div>
                                <label for="description_fr">La description:</label>
                                <textarea name="description_fr" id="description_fr"></textarea>
                            </div>
                            <div>
                                <label for="description_en">Description:</label>
                                <textarea name="description_en" id="description_en"></textarea>
                            </div>
                            
                            <div>
                                <label for="price">Prijs/Prix/Price:</label>
                                <input type="text" name="price" id="price" required>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection