<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
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
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'discount' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
