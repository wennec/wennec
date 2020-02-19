<?php

namespace App\Container\Wennec\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'tipoNoticia'=>'required|string|max:255',
            'imagenNoticia'=>'image|max:5000',
            'descripcion'=>'required|string|max:255',
            'fechaInicio'=>'required',
            'fechaFin'=>'required',
        ];
    }
}
