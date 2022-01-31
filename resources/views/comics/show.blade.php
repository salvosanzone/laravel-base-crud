@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>{{ $comic->slug }}</h1>
    <div class="row">
      <div class="col-2 ">
        <img class="img-fluid" src="{{ $comic->image }}" alt="">
      </div>
      <div class="col-4 offset-2">
        <p>{{ $comic->description }}</p> 
        <h6> {{ $comic->sale_date }} </h6>
        <td><a href="{{ route('comics.edit', $comic) }}" class="btn btn-primary">EDIT</a></td>
      </div>
  </div>
  <div class="container my-3">
    <a href="{{ route('comics.index') }}"><< Back</a>
  </div>
  
@endsection