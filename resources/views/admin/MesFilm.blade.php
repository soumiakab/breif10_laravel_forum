@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('films.create') }}" class="btn btn-primary m-5" style="float:right"> Ajouter Film</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">titre</th>
      <th scope="col">poster</th>
      <th scope="col">date Sortie</th>
      <th scope="col">action</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($films as $film)
    <tr>
      <td>{{$film->titre}}</td>
      <td><img src="{{$film->poster}}" style="width:20px;height:20px" alt=""></td>
      <td>{{$film->dateSortie}}</td>
      <td style="display:flex;">



                    <form action="{{ route('films.destroy', $film->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('films.show',$film->id) }}">Details</a>

                    <a class="btn btn-primary" href="{{ route('films.edit',$film->id) }}">Modifier</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" title="Delete">Delete</button>
                    </form>

            </td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
