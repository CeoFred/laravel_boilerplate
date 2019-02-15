<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

        public function __constructor(){
            $this->middleware('guest',['except' => 'destroy']);
            //only guest can access this class
        }

   public function create(){
            return view('sessions.create');
    }
    public function store(){
        $this->validate(request(),[
            'email' => 'required',
            'password' => 'required'
        ]);
       $auth = auth()->attempt(request(['email','password'])); //attempt to login the user

        //if not, redirect
if(!$auth){
    return back()->withErrors([
   'message' =>  'Wrong email or password'
    ]);
}

return redirect('/');

    }
    public function destroy(){
        auth()->logout();

        return redirect('/');
        
    }
}
