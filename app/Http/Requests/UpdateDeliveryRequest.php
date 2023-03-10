<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryRequest extends FormRequest
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
            // 'username' =>  'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }
}
