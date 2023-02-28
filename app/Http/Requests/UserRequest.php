<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'role_id' => ['required', 'integer'],
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
            'email.unique' => 'Este endereço de e-mail já está em uso.',
            'username.unique' => 'Este nome de usuário já está em uso.',
            'username.required' => 'O nome de usuário é obrigatório.',
            'email.required' => 'O endereço de e-mail é obrigatório.',
            'firstname.required' => 'O nome é obrigatório.',
            'lastname.required' => 'O sobrenome é obrigatório.',
            'role_id.required' => 'O papel é obrigatório.',
        ];
    }
}
