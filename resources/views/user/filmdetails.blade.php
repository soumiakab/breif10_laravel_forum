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
  <img class="card-img-top" src="{{$film->poster}}" alt="film image">
  </div>
</div>

<div class="row">
@if(isset(Auth::user()->id))
    <form action="{{ route('users.store') }}" method="post" style="width:100%;">
        <input type="text" name="id" value="{{$film->id}}" class="form-control" hidden >
        @csrf
        <div class="form-group d-flex m-5"><input type="text" name="comment" class="form-control" > <input type="submit" value="commenter" class="btn btn-primary"></div>
        </form>
@endif
</div>




</div>




</div>
<div class="row justify-content-center">
<div class="col-md-8">
<table class="table">

  <tbody>
  @php($i=1)
  @foreach ($comments as $comment)
    <div class="row">
        <div class="col-8">
            <form action="{{ route('users.update', $comment->id) }}" method="post" >
                <input type="hidden" name="_method" value="PUT" hidden>
                @csrf

                    <div class="form-group" id="form{{$i}}" style="display:none;">
                    <input type="text" name="comment"  value="{{$comment->commentaire}}">
                    <input type="text" name="idf"  value="{{$film->id}}" hidden>
                    <button class="btn btn-primary">enregistrer</button>
                    </div>
            </form>
        <span id="comment{{$i}}">{{$comment->commentaire}}</span>
      </div>
      @if(isset(Auth::user()->id) && isset($comment->user_id))
      @if(Auth::user()->id== $comment->user_id)
      <div class="col-4 d-flex">
            <button type="button" class="btn btn-primary" id="bmod{{$i}}" onclick="edit2({{$i}})">Modifier</button>&nbsp;

                <form name="form" action="{{ route('users.destroy', $comment->id) }}"  method="POST">
                         @csrf
                        @method('DELETE')
                        <input type="text" name="idf" value="{{$film->id}}" hidden>
                        <button class="btn btn-danger" type="submit" id="formsup{{$i}}">supprimer</button>
                </form>
      </div>
      @endif
      @endif
      </div>
<br>
      @php($i++)
    @endforeach
  </tbody>
</table>
</div>

</div>

</div>
<script>
function edit(x){
    // alert(x.parentNode.childNodes[4].value);
    x.parentNode.childNodes[1].style='display:block';
    x.parentNode.childNodes[3].style='display:none';
    x.parentNode.childNodes[5].style='display:none';
    x.parentNode.childNodes[7].style='display:none';
}
function edit2(i){
    document.getElementById('form'+i).style='display:block';
    document.getElementById('formsup'+i).style='display:none';
    document.getElementById('bmod'+i).style='display:none';
   document.getElementById('comment'+i).style='display:none';
}

</script>
@endsection
