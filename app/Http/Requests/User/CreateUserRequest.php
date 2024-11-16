<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:40|unique:users,email', // Unique email
            'role' => 'required|string|exists:roles,name',
            'phone' => 'nullable|string|max:15', // Optional phone field
        ];
    }


    /**
     * Custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            // Custom error messages
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be longer than 40 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already in use. Please choose a different one or re-activate the account.',
            'role.required' => 'The role field is required.',
            'role.exists' => 'The selected role is invalid. Please choose a valid role.',
            'phone.max' => 'The phone number may not be longer than 15 characters.',
        ];
    }
}
