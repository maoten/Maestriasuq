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
        'name'=>'min:4|max:45|required',
        'cc'=>'min:6|max:45|required|unique:estudiante',
        'email'=>'min:4|max:45|required|unique:estudiante',
        'password'=>'min:4|max:45|required',
        'phone'=>'min:6|max:45|required',
        'profession'=>'min:4|max:45|required',
        'college'=>'min:4|max:30|required'

        ];
    }
}
