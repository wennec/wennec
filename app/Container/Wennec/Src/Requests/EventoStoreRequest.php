<?php

namespace App\Container\Wennec\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoStoreRequest extends FormRequest
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
            'titulo_evento' => 'required',
            'fecha' => 'required',
        ];
    }
}
