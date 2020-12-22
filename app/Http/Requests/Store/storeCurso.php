<?php

namespace App\Http\Requests\Store;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class storeCurso extends FormRequest
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
            'curso' => ['required','max:255','min:3',Rule::unique('cursos')->where('status', 1)]
        ];
    }
}
