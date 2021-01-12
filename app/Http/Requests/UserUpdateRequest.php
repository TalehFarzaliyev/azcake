<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'firstname' => 'required|string|max:50',
            'lastname'  => 'required|string|max:50',
            'gender'    => 'required|max:1',
            'email'     => "unique:users,email,$this->id,id",
            'phone'     => 'required|string|max:15',
            'birthday'  => 'required|string',
            'status'    => 'required|boolean'
        ];
    }
}
