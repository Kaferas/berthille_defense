<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'mother_name' => 'required|string|max:50',
            'father_name' => 'required|string|max:50',
            'Adresse' => 'required',
            'birth_date' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Son Nom est requis!',
            'prenom.required' => 'Son Prenom est requis!',
            'mother_name.required' => 'Le Nom de sa Mere est requis',
            'father_name.required' => 'Le Nom de son Pere est requis',
            'Adresse.required' => 'L\'adresse est requis!',
            'birth_date.required' => 'La date de Naissance est requis!'
        ];
    }
}
