<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateGrado extends FormRequest
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
            'grados' => ['required','max:11','min:1','integer',Rule::unique('grado')->where('status', 1)->ignore($this->Grado)]
        ];
    }

    public function attributes()
    {
        return [
            'grados' => 'grado'
        ];
    }
}
