<?php

namespace App\Container\Wennec\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
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
            'PK_id'=> 'integer|exists:tbl_usuarios,PK_id|required',
            'name'=>'string|max:50',
            'email'=> sprintf('email|unique:tbl_usuarios,email,%d,PK_id',$this->PK_id),
            'password'=> 'string|min:7|confirmed',
        ];
    }
}
