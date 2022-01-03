<?php

namespace App\Http\Requests\Backend\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsersRequest extends FormRequest
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
        $commonRule = [
            'email'    => [
                'required', 'email', Rule::unique('users')->ignore($this->id)
            ],
            'name'     => 'required|max:100','regex:/^[A-Za-z][A-Za-z0-9]{5,31}$/',
            'role_id'  => 'required'
        ];

        if ($this['password']) {
            $tmp = [
                'password' => 'nullable|min:7',
            ];
            $commonRule = array_merge($commonRule, $tmp);
            return $commonRule;
        }

        return $commonRule;
    }
}