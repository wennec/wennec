<?php

namespace App\Container\Wennec\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluacionDocenteRequest extends FormRequest
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
            'PK_id'=> 'integer|exists:tbl_usuarios,PK_id',
            'puntualidad'=>'string|max:50',
            'dinamismo'=>'string|max:50',
            'respeto'=>'string|max:50',
            'actitud'=>'string|max:50',
        ];
    }
}
