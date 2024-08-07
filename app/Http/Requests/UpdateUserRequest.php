<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if you have specific authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name must be a string.',
            'email.email' => 'The email address must be a valid email format.',
            'email.unique' => 'The email address must be unique.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
