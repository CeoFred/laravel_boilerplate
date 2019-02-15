<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    // use RegistersUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function create(Request $request)
{
    $rules = [
        // 'name' => 'unique:users|required',
        'email'    => 'unique:users|required',
        'password' => 'required',
     
    ];

    $input     = $request->only('email','password');
    $validator = Validator::make($input, $rules);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'error' => $validator->messages()]);
    }
    $name = $request->name;
    $email    = $request->email;
    $password = $request->password;
    $user     = User::create(['name' => $name,'email' => $email, 'password' => \Hash::make($password)]);
   
        $token = $user->createToken('TutsForWeb')->accessToken;
 
        return response()->json(['token' => $token], 200);

}
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return 'logged in';
        }else{
            return 'freak';
        }
    }

    public function check(){
       if (Auth::check()) {
    return 'user dey sha';
}else{
    return 'User no dey';
}
    }
}
