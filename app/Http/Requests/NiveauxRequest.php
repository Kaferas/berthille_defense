<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NiveauxRequest extends FormRequest
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
            'nom_niveau' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return  [
            'nom_niveau' => 'Le Nom du Niveau est Requis',
        ];
    }
}
