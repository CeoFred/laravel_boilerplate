<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use App\User;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function __constructor(){
        // $this->middleware('guest');
    }
    public function create(){
        return view('registration.create');
    }
    public function store(RegistrationRequest $request){
       
        //register
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');

        $user->save();

// $user =    User::create([
//                 'name','email','password'
//             ]);

//login user using autgh facades
                auth()->login($user);


                Mail::to($user)->send(new Welcome);

                session()->flash('message','Thanks for signing up');
//redirect

        return redirect('/');

    }
}
