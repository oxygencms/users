<?php

namespace Oxygencms\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Oxygencms\Users\Contracts\Admin\UserRequestInterface;

class UserRequest extends FormRequest implements UserRequestInterface
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
        $key = $this->isMethod('POST') ? '' : $this->user->id;

        $rules = [
            'active' => 'required|boolean',
            'roles' => 'array|distinct',
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$key",
            'phone' => "nullable|string|regex:/^[0-9- ]+$/u",
        ];

        if ($this->method('POST')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        return $rules;
    }
}
