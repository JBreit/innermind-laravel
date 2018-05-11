<?php

namespace Innermind\User\Requests;

use Innermind\Support\Http\FormRequest;

class RegistrationForm extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    /**
     * Get the validation error message that applies to the request
     *
     * @return string
     */
    public function messages()
    {
        return [
            'name.required' => 'Name Required',
            'email.required' => 'Email Required',
            'password.required' => 'Password Required'
        ];
    }
}