<?php
namespace App\Http\Requests;

class TrabajoGradoRequest extends Request
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
            'titulo'       => 'regex:/^[A-Z0-9 a-z]*$/u|min:4|max:120|required',
            'trabajogrado' => 'required|mimes:pdf|max:5120'
        ];
    }
}
