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
    $user = Auth::user();

    switch($this->method())
    {
        case 'GET':
        case 'DELETE':
        {
            return [];
        }
        case 'POST':
        {
            return [
        'firstname' => 'required',
        'lastname' => 'required', 
        'phone' => 'required', 
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password'
            ];
         Request::flash();   
        }
        case 'PUT':
        case 'PATCH':
        {
            return [
        'firstname' => 'required',
        'lastname' => 'required', 
        'phone' => 'required', 
        'email' => 'required|email|unique:users'. $user->id
            ];

            return'patch';
          Request::flash();  
        }
        default:break;
    }
}





}
