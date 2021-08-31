<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class GroupFormRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3', 'max:128', Rule::unique('m_groups')->ignore($this->id)
            ]
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'k để trống',
    //         'name.min' => 'ít nhất 3 kí tự',
    //         'name.max' => 'tối đa 128 kí tự',
    //         'name.unique' => 'tên đã có',
    //     ];
    // }

    function failedValidation(ValidationValidator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status' => 422, // erros validate
            ],
            200 // success
        ));
    }
}