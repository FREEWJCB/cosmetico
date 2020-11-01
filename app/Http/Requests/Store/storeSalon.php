<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeSalon extends FormRequest
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
            'salones' => ['required','max:10','min:1',Rule::unique('salon')->where('status', 1)]
        ];
    }

    public function attributes()
    {
        return [
            'salones' => 'salon'
        ];
    }
}
