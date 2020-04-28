<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProgramFormRequest extends FormRequest
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
            'duration' => ['required', 'string','max:255'],
            'degree' => ['required', 'string'],
            'language'=> ['required', 'string'],
            'requirement' => ['required', 'string'],
            'domaine' => ['required', 'string'],
            'details' => ['required', 'string'],
            'tuition' => ['required'],
            'accomodation'=> ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vous devez entrer un nom',
            'name.string'=>'Le nom doit être en caractère',
            'email.required'=>'Le champ email est requis',
            'email.string'=>'L\'email doit être en caractère',
            'email.email'=>'L\'email doit contenir @ et .',
            'password.required'=>'Le mot de passe est requis',
            'password.min'=>'Le password doit être au minimum 8 caractère',
            'password.confirmed'=>'Le password doit être le même',
        ];
    }
}
