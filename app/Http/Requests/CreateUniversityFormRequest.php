<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUniversityFormRequest extends FormRequest
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
            'name' => ['required', 'string','max:255'],
            'slogan' => ['required', 'string','max:255'],
            'ville' => ['required', 'string'],
            'website'=> ['required', 'string'],
            'wechat' => ['required', 'string'],
            'ranking' => ['required', 'integer'],
            'province' => ['required', 'string'],
            'details' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vous devez entrer un nom',
            'name.string'=>'Le nom doit être en caractère',
            'slogan.required'=>'Le champ email est requis',
            'slogan.string'=>'L\'email doit être en caractère',
            'ville.required'=>'L\'email doit contenir @ et .',
        ];
    }
}
