<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;

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
        'titulo'=>'min:5|max:255|required',
       // 'propuesta' => 'mime:doc,docx,pdf'
        //'enfoque'=>'min:5|max:255|required',
        //'dir:id'=>'required',
        //'propuesta'=>'required'  
        ];
    }
}
