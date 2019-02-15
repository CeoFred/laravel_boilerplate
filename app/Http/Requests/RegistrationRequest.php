<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email|required',
            'password' =>  'required|confirmed',

        ];
    }

    public function persist(){
        //this class is a request object
          //register
      
        
        $user = new User();
        $user->name = $this->only('name');
        $user->email = $this->only('email');
        $user->password = $this->only('password');
        $user->save();

// $user =    User::create([
//                 'name','email','password'
//             ]);

//login user using autgh facades
                auth()->login($user);


                Mail::to($user)->send(new Welcome);

    }
}
