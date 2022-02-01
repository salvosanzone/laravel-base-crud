@extends('layouts.main')

@section('content')
  
  <div class="container my-5">
    <div class="row">
      <div class="col-8 offset-2">
        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          </div>
        @endif
        <h2>Modifica di: {{ $comic->slug  }}</h2>
        <form action="{{ route('comics.update', $comic) }}" method="post">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" value="{{ old('slug', $comic->slug) }}" class="form-control @error('title') is-invalid @enderror" name="title"  id="title" placeholder="Titolo Fumetto">
            @error('title')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">    
            <label for="series" class="form-label">Nome della serie</label>
            <input type="text" value="{{ old('series', $comic->series) }}" class="form-control @error('series') is-invalid @enderror" name="series"  id="series" placeholder="Nome Fumetto">
            @error('series')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" value="{{ old('type', $comic->type) }}" class="form-control @error('type') is-invalid @enderror" name="type"  id="type" placeholder="Tipo di Fumetto">
            @error('type')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" value="{{ old('image', $comic->image) }}" class="form-control @error('image') is-invalid @enderror" name="image"  id="image" placeholder="URL immagine">
            @error('image')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" value="{{ old('price', $comic->price)}}" class="form-control  @error('price') is-invalid @enderror" name="price"  id="price" placeholder="Prezzo">
            @error('price')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="sale_date" class="form-label">Data di vendita</label>
            <input type="text" value="{{ old('sale_date', $comic->sale_date) }}" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date"  id="sale_date" placeholder="Data di vendita">
            @error('sale_date')
              <div class="form_errors">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" name="description"  id="description" placeholder="Descrizione">{{ old('description', $comic->description) }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
    </div>
  </div>

@endsection