<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BouquetRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom_bouquet' => 'required|string|max:50',
            'price_bouquet' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }


    public function messages()
    {
        return [
            'nom_bouquet' => 'Le Nom du Bouquet est requis',
        ];
    }
}
