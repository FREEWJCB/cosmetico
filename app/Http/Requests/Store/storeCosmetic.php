<?php

namespace App\Http\Requests\Store;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;

class storeCosmetic extends FormRequest
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
            'marca' => ['required',new NotNull()],
            'modelo' => ['required',new NotNull()],
            'tipo' => ['required',new NotNull()],
            'cosmetico' => ['required','max:255','min:3','unique:cosmetics,cosmetico'],
            'descripcion' => ['required']
        ];
    }
}
