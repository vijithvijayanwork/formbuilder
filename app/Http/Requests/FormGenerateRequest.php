<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormGenerateRequest extends FormRequest {

    public function rules() {
        return [
            'formname' => 'required|string|max:255',
            'formdata' => 'required',
            'formaction' => 'url',
            'formmethod' => 'required',
        ];
    }

    public function messages() {
        return [
            'formname.required' => 'Form Name is required',
            'formname.string' => 'Form Name should be string',
            'formname.max' => 'Maximum length of Form Name allowded is 255.',
            'formdata.required' => 'Form Data is required',
            'formaction.url' => 'Form Action must be a valid url',
            'formmethod.required' => 'Form Method is required',
        ];
    }

}
