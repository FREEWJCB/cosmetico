<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeState extends FormRequest
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
            'states' => ['required','max:255','min:3',Rule::unique('state')->where('status', 1)]
        ];
    }

    public function attributes()
    {
        return [
            'states' => 'estado'
        ];
    }
}
