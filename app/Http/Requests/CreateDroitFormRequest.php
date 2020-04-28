<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDroitFormRequest extends FormRequest
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
            'signification'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'signification.required'=>'Veuillez selectionner',
            'signification.min'=>'Le minimum requis est de :min caractère',
        ];
    }
}
