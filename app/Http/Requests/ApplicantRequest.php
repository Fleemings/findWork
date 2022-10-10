<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string',
                'min:3'
            ],
            'last_name' => [
                'required',
                'string',
                'min:3'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:applicants'
            ],
            'phone_number' => [
                'required',
                'string',
                'max:255',
                'unique:applicants'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required'
        ];
    }
}
