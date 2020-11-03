<?php

namespace App\Http\Requests\Store;

use App\Rules\NotNull;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class storeMunicipality extends FormRequest
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
            'state' => ['required',new NotNull()],
            'municipalitys' => ['required','max:255','min:3',Rule::unique('municipality')->where('status', 1)]
        ];
    }

    public function attributes()
    {
        return [
            'state' => 'estado',
            'municipalitys' => 'municipio'
        ];
    }
}
