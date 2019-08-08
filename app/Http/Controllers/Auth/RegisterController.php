<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller as Controller;

use DB;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // protected function guard()
    // {
    //     return Auth::guard('guard-name');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'password' => 'required',
        );

        $this->validator($request, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
    {

          // Check with DB if the requested username is already taken
          $existUser = $request->input('user_name');

          $results = DB::select('select * from users where username = :username', ['username' => $existUser]);

          // Found username in the DB and return response to sthe front
          if ($results != Null) {

            return response()->json(['success'=>'Username was taken']);

          }

          // Check if all the fields have info
          $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'user_name' => 'required',
                'password' => 'required',
            ]);

            // Check if all fields are valid
            if ($validator->passes() && $results == Null) {

                    $firstname = $request->input('first_name');
                    $lastname = $request->input('last_name');
                    $username = $request->input('user_name');
                    $password = bcrypt($request->input('password'));

                    // Insert form data into users table
                    DB::insert('insert into users (firstname, lastname, username, password) values (?, ?, ?, ?)', [$firstname, $lastname, $username, $password]);

    			          return response()->json(['success'=>'validator passes and DB insertion success']);

            }else {

        	     return response()->json(['error'=>$validator->errors()->all()]);

            }

    }

    // Show user Registration form
    public function showRegisterPage()
    {
      return view('register');
    }

}
