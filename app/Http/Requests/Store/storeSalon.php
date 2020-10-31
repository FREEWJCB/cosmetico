<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class storeSalon extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'cargos' => 'required|max:255|min:3|unique:cargo,cargos'
        ];
    }

    public function attributes()
    {
        return [
            'cargos' => 'cargo'
        ];
    }
}
