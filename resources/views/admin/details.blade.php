@extends('layouts.app')

@section('content')
<div class="container ">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card ">
  <div class="card-header">
  Titre: {{$film->titre}}
  <span class="card-text" style="float:right;">Date de sortie: {{$film->dateSortie}}</span>
  </div>
  <div class="card-body">
  <img class="card-img-top" src="../{{$film->poster}}" alt="film image">
  </div>
</div>
</div>




</div>




</div>
@endsection
