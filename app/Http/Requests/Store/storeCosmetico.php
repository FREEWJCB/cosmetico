<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class storeCosmetico extends FormRequest
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
            'marca' => ['required','max:255','min:3'],
            'modelo' => ['required','max:255','min:3'],
            'tipo' => ['required','max:255','min:3'],
            'cosmetico' => ['required','max:255','min:3','unique:cosmeticos,cosmetico'],
            'descripcion' => ['required']
        ];
    }
}
