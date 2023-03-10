<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
            'status' => 'required|in:active,inactive',
            'en_name' => 'required|string|max:255',
            'ar_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255|unique:stores,phone_number',
            'email' => 'required|unique:stores,email',
            'min_order' => 'required|numeric',
            'tax_number' => 'required|string|max:255',
            // 'password' => 'required|string|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'يجب تحديد حالة المتجر',

            'en_name.required' => 'يجب إدخال اسم المتجر باللغة الإنجليزية',
            'en_name.string' => 'يجب أن تكون اسم المتجر باللغة الإنجليزية بشكل صحيح',
            'en_name.max' => 'يجب أن لا يتجاوز اسم المتجر باللغة الإنجليزية 255 حرفا',

            'ar_name.required' => 'يجب إدخال اسم المتجر باللغة العربية',
            'ar_name.string' => 'يجب أن تكون اسم المتجر باللغة العربية بشكل صحيح',
            'ar_name.max' => 'يجب أن لا يتجاوز اسم المتجر باللغة العربية 255 حرفا',

            'phone_number.required' => 'يجب إدخال رقم الهاتف',
            'phone_number.string' => 'يجب أن يكون رقم الهاتف بشكل صحيح',

            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم من قبل',

            'min_order' => 'يجب إدخال رقم الطلب الأدنى',
            'tax_number.required' => 'يجب إدخال رقم الضريبة',

            'image' => 'يجب إدخال صورة المتجر',
        ];
    }
}
