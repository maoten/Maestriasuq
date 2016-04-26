<?php
namespace App\Http\Requests;

class LoginRequest extends Request
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
            'email'    => 'email|min:60|max:50|required|unique:users',
            'password' => 'min:5|max:30|required'
        ];
    }
}
