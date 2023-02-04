<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        $rules = [
            'title' => ['required','string','max:150'],
            'number_of_lists' => ['required','numeric','max:100'],
            'uploaded_document' => ['required','file','mimes:txt,pdf,doc,docx','max:102400']
        ];

        switch ($this->getMethod()){
            case 'POST':
                return $rules;
            case 'DELETE':
                return [
                    'id'=>'requared|integer|exists:documents,id'
                ];
        }
    }
}
