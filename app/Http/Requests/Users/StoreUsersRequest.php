<?php

namespace App\Http\Requests\Backend\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsersRequest extends FormRequest
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
            'email'    => [
                'required', 'email', Rule::unique('users')->ignore($this->id)
            ],
            'password' => 'required|min:7',
            'name'     => 'required|max:100','regex:/^[A-Za-z][A-Za-z0-9]{2,31}$/',
            'role_id'  => 'required',
            'avatar'   => 'required|image|mimes:jpeg,jpg,png|max:10000'
        ];
    }
}