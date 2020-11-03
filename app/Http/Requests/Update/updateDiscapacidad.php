<?php

namespace App\Http\Requests\Update;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateDiscapacidad extends FormRequest
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
            'tipo' => ['required',new NotNull()],
            'discapacidades' => ['required','max:255','min:3',Rule::unique('discapacidad')->where('status', 1)->ignore($this->Discapacidad)],
            'descripcion' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'discapacidades' => 'discapacidad'
        ];
    }
}
