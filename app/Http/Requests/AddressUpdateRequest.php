<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;
use App\User;
use Auth;

class AddressUpdateRequest extends Request
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
    
    if(Request::get('postcode') !== 'Collected' )
    {
            return [
                'address1' => 'required',
                'town' => 'required', 
                'county' => 'required', 
                'postcode' => 'required',
                    ];
    } else {
            return [
                'postcode' => 'required',
                    ];
    }

        Request::flash();  
    }

}
