<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactFormRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=>'required|email',
            'message'=>'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'vous devez donner votre nom',
            'name.min'=>'le minimum réquis pour le nom est de :min char',
            'email.required'=>'vous devez entrer un email',
            'email.email'=>'Vous devez écrie au format email avec des @ et .com/fr/gn/...',
            'message.required'=>'vous devez donner ecrire un message',
            'message.min'=>'le minimum réquis pour le champ message est de :min char',
        ];
    }
}
