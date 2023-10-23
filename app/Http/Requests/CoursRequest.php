<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
            'name_cours' => 'required|string|max:50',
            'description_cours' => 'required|string',
            'hours_cours' => 'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name_cours.required' => 'Le Nom du cours est Requis',
            'description_cours.required' => 'La description est requis',
            'hours_cours.required' => 'Le Nombre d\'heure requis'
        ];
    }
}
