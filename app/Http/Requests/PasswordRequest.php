<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordRequest extends FormRequest
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
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8', 'max:255', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[0-9])/i'],
            'new_password_confirmation' => ['required', 'min:8', 'max:255', 'same:new_password'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'current_password.required' => 'A senha atual é obrigatória.',
            'current_password.password' => 'A senha atual está incorreta.',
            'new_password.required' => 'A nova senha é obrigatória.',
            'new_password.min' => 'A nova senha deve ter pelo menos :min caracteres.',
            'new_password.max' => 'A nova senha não deve ter mais de :max caracteres.',
            'new_password.confirmed' => 'A nova senha e a confirmação de senha devem ser iguais.',
            'new_password.regex' => 'A nova senha deve conter pelo menos uma letra e um número.',
            'new_password_confirmation.required' => 'A confirmação da nova senha é obrigatória.',
            'new_password_confirmation.min' => 'A confirmação da nova senha deve ter pelo menos :min caracteres.',
            'new_password_confirmation.max' => 'A confirmação da nova senha não deve ter mais de :max caracteres.',
            'new_password_confirmation.same' => 'A nova senha e a confirmação de senha devem ser iguais.'
        ];
    }
}
