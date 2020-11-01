<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeSeccion extends FormRequest
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
            'secciones' => ['required','max:10','min:1',Rule::unique('seccion')->where('status', 1)]
        ];
    }

    public function attributes()
    {
        return [
            'secciones' => 'sección'
        ];
    }
}
