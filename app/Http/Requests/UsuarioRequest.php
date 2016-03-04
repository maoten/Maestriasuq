<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
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
            'nombre'=>'min:4|max:120|required',
            'cedula'=>'min:4|max:120|required',
            'email'=>'min:4|max:250|required|unique:users',
            'telefono'=>'min:4|max:120|required',
            'profesion'=>'min:4|max:120|required',
            'universidad'=>'min:4|max:120|required',
            'password'=>'min:4|max:30|required'
        ];
    }
}
