<?php

namespace App\Http\Requests\Store;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeAlergia extends FormRequest
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
            'alergias' => ['required','max:255','min:3',Rule::unique('alergia')->where('status', 1)],
            'descripcion' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'alergias' => 'alergia'
        ];
    }
}
