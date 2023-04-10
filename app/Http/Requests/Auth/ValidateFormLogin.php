<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormLogin extends FormRequest
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
     * @return array<string, mixed>
     */
     public function rules(): array
    {
        return [
            'username' => ['required', 'alpha_num', 'min:8'],
            'password' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.alpha_num' => 'Tên dăng nhập chỉ chứa ký tự và số',
            'username.min'  => 'Tên đăng nhập có độ dài tối thiểu 8 ký tự',
            'required' => 'The :attribute field is required.',
        ];
    }
}
