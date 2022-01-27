@extends('layouts.main')

@section('content')
  <div class="container">
    <h1>{{ $comic->slug }}</h1>
    <a href="{{ route('comics.index') }}"><< Back</a>
  </div>
@endsection