<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeGrado extends FormRequest
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
            //
            'grados' => ['required','max:11','min:1','integer',Rule::unique('grado')->where('status', 1)]
        ];
    }

    public function attributes()
    {
        return [
            'grados' => 'grado'
        ];
    }
}
