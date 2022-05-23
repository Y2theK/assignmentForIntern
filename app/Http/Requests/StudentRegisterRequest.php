<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'nrc' => 'required|string|unique:students,nrc',
            'dob' => 'required|date',
            'courses' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Email must be your own email.',
            'nrc.unique' => 'NRC must be unique.',
            'dob.required' => 'Date of Birth field is required.'
        ];
    }
}
