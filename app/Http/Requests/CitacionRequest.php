<?php
namespace App\Http\Requests;

class CitacionRequest extends Request
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
            'asunto'      => 'regex:/^[A-Z0-9ÑñáéíóúÁÉÍÓÚ a-z]*$/u|min:5|max:100|required',
            'descripcion' => 'min:5|max:255|required',
            'lugar'       => 'min:5|max:150|required',
            'inicio'      => 'required|date',
            'fin'         => 'required|date|after:inicio'
        ];
    }
}
