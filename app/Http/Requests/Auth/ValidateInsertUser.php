<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ValidateInsertUser extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required','String'],
            'email' => ['required','email'],
            'userName' => ['required','alpha_num','min:8'],
            'donvi' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'vui lòng nhập đúng định dạng email',
            'userName.required' => 'Tên đăng nhập không được để trống',
            'userName.alpha_num' => 'Tên dăng nhập chỉ chứa ký tự và số',
            'usernName.min'  => 'Tên đăng nhập có độ dài tối thiểu 8 ký tự',
            'donvi.required' => 'Vui lòng chọn đơn vị',
            'required' => 'The :attribute field is requiredd.',
        ];
    }
}
