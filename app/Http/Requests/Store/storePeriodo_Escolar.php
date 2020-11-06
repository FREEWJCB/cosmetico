<?php

namespace App\Http\Requests\Store;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;
class storePeriodo_Escolar extends FormRequest
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
            'grado' => ['required',new NotNull()],
            'seccion' => ['required',new NotNull()],
            'salon' => ['required',new NotNull()],
            'ano' => ['required','max:9','min:4'],
            'empleado' => ['required','integer']
        ];
    }

    public function attributes()
    {
        return [
            'seccion' => 'sección',
            'ano' => 'año',
            'empleado' => 'profesor'
        ];
    }

    public function messages()
    {
        return [
            'empleado.required' => 'El profesor es obligatorio.',
            'empleado.integer' => 'Error en la consulta. Por favor vuelva a consultar al profesor',
        ];
    }
}
