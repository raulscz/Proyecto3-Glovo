<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearRestaurante extends FormRequest
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
            'nombre_resta'=>'required|string|max:30',
            'desc_resta'=>'required|string|max:250',
            'horario_ini_resta'=>'required',
            'horario_fi_resta'=>'required',
            'id_rol'=>'required'
        ];
    }
}
