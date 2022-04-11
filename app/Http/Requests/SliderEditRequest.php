<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderEditRequest extends FormRequest
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
            'name' => 'required|unique:sliders|max:255',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên slider không được bỏ trống',
            'name.unique' => 'Vui lòng nhập tên khác',
            'description.required' => 'Vui lòng nhập mô tả slider',
        ];
    }
}
