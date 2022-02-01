<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|min:2',
            'image' => 'required',
            'price' => 'required|numeric|min:1',
            'series' => 'required|max:50',
            'sale_date' => 'required',
            'type' => 'required|max:20'
        ];
    }

    public function messages()
    {
        return [
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
        ]; 
    }
}
