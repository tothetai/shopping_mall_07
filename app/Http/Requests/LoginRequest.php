<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Bạn chưa nhập Tên tài khoản!',
            'name.min' => 'Tên tài khoản gồm tối thiểu 3 ký tự!',
            'name.max' => 'Tên tài khoản không được vượt quá 50 ký tự!',
            'email.required' => 'Bạn chưa nhập địa chỉ Email!',
            'email.email' => 'Bạn chưa nhập đúng định dạng Email!',
            'email.unique' => 'Địa chỉ Email đã tồn tại!',
            'pass.required' => 'Bạn chưa nhập mật khẩu!',
            'pass.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
            'pass.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
        ];
    }
}
