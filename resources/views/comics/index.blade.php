@extends('layouts.main')

@section('content')

  <div class="container p-4">
    <h1>Lista Fumetti</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Title</th>
          <th scope="col">Type</th>
          <th scope="col">Price</th>
          <th colspan='3' scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comics as $comic)
          <tr>
          <th scope="row">{{ $comic->id }}</th>
          <td>{{ $comic->slug }}</td>
          <td>{{ $comic->type }}</td>
          <td>{{ $comic->price }}</td>
          <td><a href="{{ route('comics.show', $comic) }}" class="btn btn-success">SHOW</a></td>
          <td><a href="{{ route('comics.edit', $comic) }}" class="btn btn-primary">EDIT</a></td>
          <td>
            <form onsubmit="return confirm('Sei sicuro di voler eliminare: {{$comic->title}}')" action="{{ route('comics.destroy', $comic) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
          </td>
        </tr>
        @endforeach
        
        
      </tbody>
    </table>
  </div>
  <div class="container">
    {{ $comics->links() }}
  </div>
  
@endsection