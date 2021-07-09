@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
               <form action="{{ route('films.update',$film->id ) }}" method="post">
               <input type="hodden" name="_method" value="PUT" hidden>
                @csrf
               <div class="form-group"><label for="">Titre du film</label><input type="text" name="titre" class="form-control" value="{{ $film->titre }}" ></div>
               <div class="form-group"><label for="">Poster</label><input type="file" name="poster" class="form-control" value="{{ $film->poster }}"  ></div>
               <div class="form-group"><label for="">Date de sortie</label><input type="date" name="dates" class="form-control" value="{{ $film->dateSortie }}" ></div>
                <input type="submit" value="Modifier" class="btn btn-primary">
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
