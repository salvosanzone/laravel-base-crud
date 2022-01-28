@extends('layouts.main')

@section('content')

<div class="container my-5">
  <div class="row">
    <div class="col-8 offset-2">
        <h2>Inserisci un nuovo fumetto</h2>
        <form action="{{ route('comics.store') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" name="title"  id="title" placeholder="Titolo Fumetto">
          </div>
          <div class="mb-3">    
            <label for="series" class="form-label">Nome della serie</label>
            <input type="text" class="form-control" name="series"  id="series" placeholder="Nome Fumetto">
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" name="type"  id="type" placeholder="Tipo di Fumetto">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control" name="image"  id="image" placeholder="URL immagine">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" name="price"  id="price" placeholder="Prezzo">
          </div>
          <div class="mb-3">
            <label for="sale_date" class="form-label">Data di vendita</label>
            <input type="text" class="form-control" name="sale_date"  id="sale_date" placeholder="Data di vendita">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control" name="description"  id="description" placeholder="Descrizione"></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
    </div>
    
  </div>

@endsection