<?php

namespace App\Http\Requests;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'companyName' => 'required|max:120',
            'address' => 'required',
            'phone' => 'required|unique:companies,phone',
            'email' => 'required|unique:companies,email',
        ];
    }

    public function messages()
    {
        return [];
    }
}
