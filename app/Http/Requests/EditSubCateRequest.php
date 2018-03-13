<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSubCateRequest extends FormRequest
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
            //
            'name'=>'unique:sub_category,sub_name,'.$this->segment(4).',sub_id',
        ];
    }
    public function messages(){
        return [
            'name.unique'=>'Tên danh mục con đã bị trùng!',
        ]; 
    }
}
