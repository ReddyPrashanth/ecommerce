<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestCheckoutRequest extends FormRequest
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
            'guestemail' => 'required|email|unique:users,email'
        ];
    }

    public function messages(){
        return [
            'guestemail.unique' => 'You already have an account. Please login.',
            'guestemail.required' => 'The email field is required',
            'guestemail.email' => 'The email must be a valid email address.'
        ];
    }
}
