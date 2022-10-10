<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'role' => [
                'required',
                'string'
            ],
            'company_name' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required'
        ];
    }
}
