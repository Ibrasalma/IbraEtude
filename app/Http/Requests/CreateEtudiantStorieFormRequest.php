<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEtudiantStorieFormRequest extends FormRequest
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
            'given_name'=>'required|string|max:255',
            'family_name'=>'required|string|max:255',
            'birthdate'=>'required|date',
            'birthplace'=>'required|string',
            'passport_number'=>'required|string|max:255',
            'passport_expire'=>'required|date',
            'nationality'=>'required|string|max:255',
            'gender'=>'required|string|max:255',
            'marital_status'=>'required|string|max:255',
            'occupation'=>'required|string|max:255',
            'affiliated'=>'required|string|max:255',
            'highest_degree'=>'required|string|max:255',
            'relligion'=>'required|string|max:255',
            'hobbies'=>'required|string|max:255',
            'is_in_china'=>'required|string|max:255',
            'studied_china'=>'required|string|max:255',
            'pays'=>'required|string|max:255',
            'ville'=>'required|string|max:255',
            'adresse'=>'required|string|max:255',
            'code_postal'=>'required|string|max:255',
            'mobile'=>'required|string|max:255',
        ];
    }
}
