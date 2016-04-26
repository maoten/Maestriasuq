<?php
namespace App\Http\Requests;

class EditarUserRequest extends Request
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
            'cc'          => 'alpha_num|min:6|max:45|required',
            'email'       => 'email|min:5|max:50|required',
            'telefono'    => 'min:6|max:45|required',
            'profesion'   => 'regex:/^[(a-zA-Z\s)]+$/u|min:4|max:45|required',
            'universidad' => 'regex:/^[(a-zA-Z\s)]+$/u|min:3|max:45|required'
        ];
    }
}
