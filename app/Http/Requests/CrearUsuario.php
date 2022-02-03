<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearUsuario extends FormRequest
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
            'nombre_user'=>'required|string|max:30',
            'apellido_user'=>'required|string|max:30',
            'dni_user'=>'required|string|max:9|min:9',
            'edad_user'=>'required|int|min:18|max:130',
            'correo_user'=>'required|string|max:40',
            'pass_user'=>'required|string|min:8|max:20',
            'nombre_rol'=>'required|string|'
        ];
    }
}
