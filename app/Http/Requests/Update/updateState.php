<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateState extends FormRequest
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
            'cargos' => ['required','max:255','min:3',Rule::unique('cargo')->ignore($this->Cargo)]
        ];
    }

    public function attributes()
    {
        return [
            'cargos' => 'cargo'
        ];
    }
}
