<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:profile_users',
            'password' => 'required|string|min:6|confirmed',
            'sur_name' => 'nullable|string|max:255',
        ];
    }
}
