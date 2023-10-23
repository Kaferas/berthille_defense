<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name_group' => 'required|unique:groups|string|max:50',
        ];
    }

    public function messages()
    {
        return  [
            // 'name_group.required' => 'Le Nom du Groupe est Requis',
            'name_group.unique' => 'Le Nom du Groupe est deja utilise',
        ];
    }
}
