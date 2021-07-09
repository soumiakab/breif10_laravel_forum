@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
               <form action="{{ route('films.store') }}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="form-group"><label for="">Titre du film</label><input type="text" name="titre" class="form-control" ></div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Film Poster</label>
                    <input type="file" name="poster" class="form-control-file" id="exampleFormControlFile1" onchange="fileName(this);">
                    <!-- <input type="text" value="" name="posterName" id="posterName" hidden> -->
                </div>
               <div class="form-group"><label for="">Date de sortie</label><input type="date" name="dates" class="form-control"></div>
                <input type="submit" value="Ajouter" class="btn btn-primary">
               </form>
            </div>
        </div>
    </div>
</div>
<script>
    // function fileName(file){
    //     document.getElementById('posterName').value=file.files[0].name;
    // }
</script>
@endsection
