<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user'=>'unique:user_table,name,'.$this->segment(4).',id',
            'mail'=>'unique:user_table,email,'.$this->segment(4).',id',
            'mail'=>'email:user_table,email,'.$this->segment(4).',id',
            'pass'=>'min:6:user_table,password,'.$this->segment(4).',id',
            'pass'=>'max:10:user_table,password,'.$this->segment(4).',id',
        ];
    }

    public function messages(){
        return [
            'user.unique'=>'Tên người dùng bị trùng!',
            'mail.unique'=>'Email đã bị trùng!',
            'mail.required'=>'Email không đúng địnn dạng',
            'pass.min'=>'Mật khẩu tối thiểu 6 ký tự',
            'pass.max'=>'Mật khẩu tối đa 10 ký tự',
        ]; 
    }
}
