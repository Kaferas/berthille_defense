<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesseurRequest extends FormRequest
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
            'email' => 'required|email',
            'phone_number' => 'string|max:50',
            'cni_number' => 'required',
            'adresse' => 'required',
        ];
    }

    public function messages()
    {
        return  [
            'name' => 'Le Nom est Requis',
            'prenom' => 'Prenom Requis',
            'email' => 'Adresse Email Requis | Format Mail Incorrect',
            'phone_number' => 'Numero Telephone Requis',
            'cni_number' => 'CNI est requis',
            'adresse' => 'L\'adresse Obligatoire',
        ];
    }
}
