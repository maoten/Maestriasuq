<?php
namespace App\Http\Requests;

class JuradoRequest extends Request
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
            'nombre'      => 'regex:/^([A-Za-zÑñáéíóúÁÉÍÓÚ ]+)$/u|min:3|max:45|required',
            'cc'          => 'alpha_num|min:6|max:45|required|unique:users',
            'pasaporte'   => 'alpha_num|min:6|max:45|required|unique:jurados',
            'email'       => 'email|min:5|max:50|required|unique:users',
            'password'    => 'min:5|max:30|required',
            'telefono'    => 'numeric|required|unique:users',
            'profesion'   => 'regex:/^([A-Za-zÑñáéíóúÁÉÍÓÚ ]+)$/u|min:4|max:45|required',
            'universidad' => 'regex:/^([A-Za-zÑñáéíóúÁÉÍÓÚ ]+)$/u|min:3|max:45|required'

        ];
    }
}
