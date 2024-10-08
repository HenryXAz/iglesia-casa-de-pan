<?php

namespace App\Http\Requests\Auth;

use App\Dtos\Auth\CredentialsDTO;
use Illuminate\Foundation\Http\FormRequest;

class EmailLoginRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'ingrese correo electronico',
            'email.email' => 'ingrese correo electronico válido',
            'password.required' => 'ingrese contraseña',
            'password.min' => 'la contraseña debe contener un mínimo de 6 caracteres',
            'password.confirmed' => 'la contraseña no coincide con la confirmación de contraseña'
        ];
    }

    public function data(): CredentialsDTO
    {
        return CredentialsDTO::from([
            'identifier' => $this->input('email'),
            'password' => $this->input('password'),
        ]);
    }
}


