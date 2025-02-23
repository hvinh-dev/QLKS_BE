<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapQuyenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_quyen'          =>   'required|exists:phan_quyens,id',
            'id_chuc_nang'      =>   'required|exists:chuc_nangs,id',
        ];
    }

    public function messages()
    {
        return [
            'id_quyen.*'          =>   'Quyền không tồn tại',
            'id_chuc_nang.*'      =>   'Chức năng không tồn tại',
        ];
    }

}
