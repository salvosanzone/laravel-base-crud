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
      <h2>Inserisci un nuovo fumetto</h2>
      <form action="{{ route('comics.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" 
          class="form-control @error('title') is-invalid @enderror" 
          value="{{ old('title') }}"
          name="title"  
          id="title" 
          placeholder="Titolo Fumetto">
          @error('title')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">    
          <label for="series" class="form-label">Nome della serie</label>
          <input type="text" 
          class="form-control @error('series') is-invalid @enderror" 
          value="{{ old('series') }}"
          name="series"  id="series" placeholder="Nome Fumetto">
          @error('series')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="type" class="form-label">Tipo</label>
          <input type="text" 
          class="form-control @error('type') is-invalid @enderror" 
          value="{{ old('type') }}"
          name="type"  id="type" placeholder="Tipo di Fumetto">
          @error('type')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Immagine</label>
          <input type="text" 
          class="form-control @error('image') is-invalid @enderror" 
          value="{{ old('image') }}"
          name="image"  id="image" placeholder="URL immagine">
          @error('image')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Prezzo</label>
          <input type="number" 
          class="form-control @error('price') is-invalid @enderror" 
          value="{{ old('price') }}"
          name="price"  id="price" placeholder="Prezzo">
          @error('price')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="sale_date" class="form-label">Data di vendita</label>
          <input type="text" 
          class="form-control @error('sale_date') is-invalid @enderror" 
          value="{{ old('sale_date') }}"
          name="sale_date"  id="sale_date" placeholder="Data di vendita">
          @error('sale_date')
            <div class="form_errors">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Descrizione</label>
          <textarea 
          type="text" 
          class="form-control" name="description"  id="description" placeholder="Descrizione">{{ old('description') }}
          </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
      </form>
    </div>
  </div>
</div>

@endsection