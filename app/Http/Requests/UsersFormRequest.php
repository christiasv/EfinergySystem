<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ID_Empresa' => ['required'],
            'ID_Area' => ['required'],
            'ID_Cargo' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'Genero' => ['required', 'string', 'max:64'],
            'Tipo_doc' => ['required', 'string', 'max:128'],
            'Doc_ident' => ['required', 'string', 'max:13'],
            'Fecha_nac' => ['required'],
            'Direccion' => ['required', 'string', 'max:256'],
            'Telefono' => ['required', 'string', 'max:15'],
            'Mail_personal' => ['string', 'email', 'max:255', 'unique:users'],
            'Foto' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Estado' => ['required'],
        ];
    }
}
