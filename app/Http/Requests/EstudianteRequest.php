<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EstudianteRequest extends Request
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
        'nombre'=>'min:4|max:45|required',
        'cedula'=>'min:6|max:45|required|unique:estudiante',
        'correo'=>'min:4|max:45|required|unique:estudiante',
        'contrasena'=>'min:4|max:45|required',
        'telefono'=>'min:6|max:45|required',
        'profesion'=>'min:4|max:45|required',
        'universidad'=>'min:4|max:30|required'

        ];
    }
}
