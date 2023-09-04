<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            
            'full_name' => 'required',
            // 'email' => 'required|email|exists:users,email',
            'kota' => 'required',
            'province' => 'required',
            'no_hp' => 'required|digits:5',
            'alamat' => 'required|string',
        ];
    }
}
