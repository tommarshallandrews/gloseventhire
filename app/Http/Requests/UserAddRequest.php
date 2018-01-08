<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use App\User;
use Auth;

class UserAddRequest extends Request
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
        'firstname' => 'required',
        'lastname' => 'required', 
        'phone' => 'required', 
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'g-recaptcha-response' => 'required|recaptcha',
        'password_confirmation' => 'required|same:password'
            ];


        Request::flash();  
    }


         public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please check the "I am not a robot" box',
        ];
    }

}
