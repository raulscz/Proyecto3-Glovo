<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPlatos extends FormRequest
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
            'nombre_plato'=>'required|string|max:30',
            'desc_plato'=>'required|string|max:100',
            'precio_plato'=>'required|numeric',
            'img_plato'=>'mimes:jpg,png,jpeg,webp,svg'
        ];
    }
}
