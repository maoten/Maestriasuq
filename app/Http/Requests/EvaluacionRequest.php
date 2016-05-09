<?php
namespace App\Http\Requests;

class EvaluacionRequest extends Request
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
            'opciones'   => 'required',
            'evaluacion' => 'required|mimes:xls|max:5120'
        ];
    }
}
