<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
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
            'id' => ['int'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'duration' => ['required','string'],
            'cost' => ['required','string'],
            'program_category_id' => ['int','required'],
            'education_form_id' => ['int','required'],
            'listener_category_id' => ['int','required'],
            'image' => ['image','mimes:jpg,png,jpeg,gif,svg','nullable','max:2048']
        ];
    }
}
