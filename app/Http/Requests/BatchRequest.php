<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchRequest extends FormRequest
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
            'name_batch' => 'required|string|max:50',
            'begin_hour' => "date_format:H:i",
            'end_hour' => "date_format:H:i|after:begin_hour"
        ];
    }

    public function messages()
    {
        return
            [
                'name_batch.required' => 'Le Nom du Batch est requis',
                'begin_hour.required' => 'L\'heure de Depart requis.',
                'end_hour.required' => 'L\'heure de Fin requis..',
                'end_hour.after' => 'L\'heure de Fin doit etre superieur a l\'heure de Depart'
            ];
    }
}
