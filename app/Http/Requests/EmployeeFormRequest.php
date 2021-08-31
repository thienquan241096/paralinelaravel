<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;


class EmployeeFormRequest extends FormRequest
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
        $formRules = [
            'email' => [
                'required', 'max:128', 'email',
                Rule::unique('m_employees')->ignore($this->id)
            ],
            'first_name' => [
                'required', 'min:2', 'max:128'
            ],
            'last_name' => [
                'required', 'min:2', 'max:128'
            ],
            'birthday' => [
                'required', 'date_format:Y-m-d'
            ],
            'address' => [
                'required', 'min:6', 'max:256'
            ],
            'avatar' => [
                // 'required',
                'mimes:jpeg,jpg,png,gif',
                'max:10000'
            ],
            'salary' => [
                'required', 'numeric', 'min:4'
            ],
        ];
        if ($this->id == null) {
            $formRules['avatar'][] = 'required';
        }
        return $formRules;
    }

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