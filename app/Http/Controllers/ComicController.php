<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // richiamo il model Comic che mi passa il db
        $comics = Comic::orderBy('id', 'desc')->paginate(5);

        // gli passo la variabile,che contiene il db, alla vista
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // se non supero la validazione non va avanti
        $request->validate(
            [
                'title' => 'required|max:50|min:2',
                'image' => 'required',
                'price' => 'required|numeric|min:1',
                'series' => 'required|max:50',
                'sale_date' => 'required',
                'type' => 'required|max:20'
            ],
            [
                'title.required' => 'Il titolo è un campo obbligatorio',
                'title.max' => 'Il numero massimo di caretteri consentiti è di :max caratteri',
                'title.min' => 'Il numero minimo di caratteri richiesti è di :min caratteri',
                'image.required' => "L'URL dell'immagine è un campo obbligatorio",
                'price.required' => 'Il prezzo è un campo obbligatorio',
                'series.required' => 'Il nome della serie è un campo obbligatorio',
                'series.max' => 'Il numero massimo di caretteri consentiti è di :max caratteri',
                'sale_date.required' => 'La data di vendita è un campo obbligatorio',
                'type.required' => 'Il tipo di fumetto è un campo obbligatorio',
                'type.min' => 'Il numero minimo di caratteri richiesti è di :min caratteri'
            ]
        );        
        // salvo dentro $data tutti campi del form inviati nella request
        $data = $request->all();
        // inizializzo 
        $new_comic = new Comic();
        $new_comic->description = $data['description'];
        $new_comic->image = $data['image']; 
        $new_comic->price = $data['price']; 
        $new_comic->series = $data['series']; 
        $new_comic->sale_date = $data['sale_date']; 
        $new_comic->type = $data['type']; 
        $new_comic->slug = Str::slug($data['title'], '-');
        

        // salvo tutto nel DB
        $new_comic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        
        
        // se utilizzo la sintassi $comic->update($data) ho bisogno di fillable

        $comic->description = $data['description'];
        $comic->image = $data['image']; 
        $comic->price = $data['price']; 
        $comic->series = $data['series']; 
        $comic->sale_date = $data['sale_date']; 
        $comic->type = $data['type']; 
        $comic->slug = Str::slug($data['title'], '-');

        $comic->save();

        return redirect()->route('comics.show', $comic);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted',"Il fumetto $comic->slug è stato eliminato"); 
    }
}
