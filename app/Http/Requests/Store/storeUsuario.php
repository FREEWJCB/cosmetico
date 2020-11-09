<?php

namespace App\Http\Requests\Store;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;
class storeUsuario extends FormRequest
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
            'empleado' => ['required','integer','unique:usuario,empleado'],
            'username' => ['required','max:10','min:8','unique:usuario,username'],
            'tipo' => ['required',new NotNull()],
            'pregunta' => ['required','max:255','min:3'],
            'respuesta' => ['required','max:20','min:3'],
            'password' => ['required','max:20','min:8'],
            'password2' => ['required','max:20','min:8']
        ];
    }
}
