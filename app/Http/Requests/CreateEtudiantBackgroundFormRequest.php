<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEtudiantBackgroundFormRequest extends FormRequest
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
            'education_1_institutition'=>'required|string|max:255',
            'education_1_option'=>'required|string|max:255',
            'education_1_degree'=>'required|string|max:255',
            'education_1_start'=>'required|date',
            'education_1_end'=>'required|date',
            'education_2_end'=>'required|date',
            'education_2_institutition'=>'required|string|max:255',
            'education_2_option'=>'required|string|max:255',
            'education_2_degree'=>'required|string|max:255',
            'education_2_start'=>'required|date',
            'education_3_institutition'=>'required|string|max:255',
            'education_3_option'=>'required|string|max:255',
            'education_3_degree'=>'required|string|max:255',
            'education_3_start'=>'required|date',
            'education_3_end'=>'required|date',
            'work_institutition'=>'required|string|max:255',
            'work_post'=>'required|string|max:255',
            'work_categori'=>'required|string|max:255',
            'work_start'=>'required|date',
            'work_end'=>'required|date',
            'contact_name'=>'required|string|max:255',
            'contact_relationship'=>'required|string|max:255',
            'contact_occupation'=>'required|string|max:255',
            'contact_adress'=>'required|string|max:255',
            'contact_email'=>'required|email',
            'contact_tel'=>'required|string|max:255',
            'pere_name'=>'required|string|max:255',
            'pere_occupation'=>'required|string|max:255',
            'pere_adress'=>'required|string|max:255',
            'pere_email'=>'required|email',
            'pere_tel'=>'required|string|max:255',
            'mere_name'=>'required|string|max:255',
            'mere_occupation'=>'required|string|max:255',
            'mere_adress'=>'required|string|max:255',
            'mere_email'=>'required|email',
            'mere_tel'=>'required|string|max:255',
        ];
    }
}
