<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:stores,email,' . $this->store->id,
            'phone_number' => 'required|string|max:255|unique:stores,phone_number,' . $this->store->id,
            'min_order' => 'required|numeric',
            'tax_number' => 'required|string|max:255',
            // 'password' => 'required|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب أن يكون البريد الإلكتروني بشكل صحيح',
            'email.max' => 'يجب أن لا يتجاوز البريد الإلكتروني 255 حرفا',
            'phone_number.required' => 'يجب إدخال رقم الهاتف',
            'min_order.required' => 'يجب إدخال رقم الحد الأدنى للطلب',
            'min_order.numeric' => 'يجب أن يكون رقم الحد الأدنى للطلب بشكل صحيح',
            'tax_number.required' => 'يجب إدخال رقم الضريبة',
            'image.mimes' => 'يجب أن تكون الصورة بصيفة jpeg,png,jpg,gif,svg',
            'image.max' => 'يجب أن لا يتجاوز الصورة 2048 بايت',
        ];
    }
}
