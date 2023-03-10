<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreManagerRequest extends FormRequest
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
        $id = 1;
        if($this->store_manager)
        {
            $id = $this->route('store_manager')->id;
        }

        return [
            'status' => 'required|in:active,inactive',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:store_managers,email,' . $id,
            'role' => 'required|in:supermanager,manager',
            'phone_number' => 'required|string|max:255|unique:store_managers,phone_number,' . $id,
            'password' => 'nullable|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'يجب تحديد حالة المدير',
            'name.required' => 'يجب إدخال اسم المدير',
            'email.required' => 'يجب إدخال بريد المدير',
            'email.unique' => 'هذا البريد مستخدم من قبل',
            'role.required' => 'يجب تحديد نوع المدير',
            'role.in' => 'يجب تحديد نوع المدير بشكل صحيح',
            'phone_number.required' => 'يجب إدخال رقم الهاتف',
            'phone_number.unique' => 'رقم الهاتف موجود بالفعل',
            'password.min' => 'يجب إدخال كلمة المرور بحد أدنى 6 أحرف',
        ];
    }
}
