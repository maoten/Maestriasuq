<?php
namespace App\Http\Requests;

class PropuestaRequest extends Request
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
            'titulo'    => 'regex:/^[A-Z0-9 a-z]*$/u|min:5|max:255|required',
            'propuesta' => 'required|mimes:pdf|max:5120'
        ];
    }
}
