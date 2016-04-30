<?php
namespace App\Http\Requests;

class UserRequest extends Request
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
            'nombre'      => 'regex:/^[(a-zA-Z\s)]+$/u|min:3|max:45|required',
            'cc'          => 'alpha_num|min:6|max:45|required|unique:users',
            'email'       => 'email|min:5|max:50|required|unique:users',
            'password'    => 'min:5|max:30|required',
            'telefono'    => 'numeric|required|unique:users',
            'profesion'   => 'regex:/^[(a-zA-Z\s)]+$/u|min:4|max:45|required',
            'universidad' => 'regex:/^[(a-zA-Z\s)]+$/u|min:3|max:45|required'

        ];
    }
}
