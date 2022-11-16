<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadDocumentRequest extends FormRequest
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
            'title' => ['required','string','max:150'],
            'description' => ['nullable','string','max:1000'],
            'number_of_lists' => ['required','numeric','max:100'],
            'uploaded_document' => ['required','file','mimes:pdf,doc,docx','max:102400']
        ];
    }
}
