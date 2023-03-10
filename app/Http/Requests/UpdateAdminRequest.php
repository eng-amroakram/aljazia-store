<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->is('manager/*') ? auth()->guard('manager')->id() : auth()->guard('admin')->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' =>  'required|string|max:255|unique:admins,username,' . $this->admin->id,
            'email' => 'required|string|max:255|unique:admins,email,' . $this->admin->id,
            'phone_number' => 'required|string|max:255|unique:admins,phone_number,' . $this->admin->id,
            'role' => 'required|in:admin,superadmin',
            'status' => 'required|in:active,inactive',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال الاسم',
            'username.required' => 'يجب إدخال اسم المستخدم',
            'email.required' => 'يجب إدخال الايميل',
            'phone_number.required' => 'يجب إدخال رقم الجوال',
            'password.required' => 'يجب إدخال كلمة السر',
            'password.min' => 'كلمة السر قصيرة',
        ];
    }


}
