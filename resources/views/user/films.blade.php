@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
@foreach ($films as $film)

<div class="card ">
  <div class="card-header">
  Titre: {{$film->titre}}
  <span class="card-text" style="float:right;">Date de sortie: {{$film->dateSortie}}</span>
  </div>
  <div class="card-body">
  <img class="card-img-top" src="{{$film->poster}}"  alt="film image">
    <!-- <h5 class="card-title">{{$film->titre}}</h5> -->


  </div>
  <div class="card-footer text-center">
  <a href="{{ route('users.show', $film->id) }}" class="btn btn-primary">Commentaires</a>
  </div>
</div>
<br>
@endforeach

</div>
</div>
</div>

@endsection
