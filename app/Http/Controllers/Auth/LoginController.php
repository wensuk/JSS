<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller as Controller;

use DB;
use Hash;
use Log;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    use AuthenticatesUsers;

    // protected function authenticated()
    // {
    //     if ( auth::check() ) {// do your margic here
    //         Log::info("passes check in authenticated in logincontroller");
    //         return view('auth.home');
    //
    //     }else{
    //         Log::info("not pass check in authenticated in logincontroller");
    //         return redirect()->route('login');
    //     }
    // }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirecstTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // $this->middleware('auth');

        $this->middleware('guest')->except('logoutUser');
    }


    // User login authentication
    public function UserLogin(Request $request) {

        $validator = Validator::make($request->all(), [
              'user_name' => 'required',
              'password' => 'required',
        ]);

        if ($validator->passes()) {

            $username = $request->input('user_name');
            // $password = $request->input('user_name');

            $results = DB::select('select * from users where username = :username', ['username' => $username]);
            $array = json_decode(json_encode($results), True);


            Log::info("This is the password in db");
            Log::info($array[0]['password']);
            Log::info("This is the password from the form");
            Log::info($request->input('password'));

            if ($results != Null) {

                  if (Hash::check($request->input('password'), $array[0]['password'])) {

                      $user = $array[0]['id'];
                      // Auth::login($user, true);
                      Auth::loginUsingId($user, true);
                      Log::info("User login using Id passes");
                      // $this->redirect()->route('/dashboard', $user);
                      // $this->showLoginPage();
                      return response()->json(['Success'=>'User is logging in.']);

                  }else{

                    return response()->json(['Ooops'=>'The password not right.']);

                  }

            }else {

                      return response()->json(['Ooops'=>'The username does not exist.']);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    // Render Login View
    public function showLoginPage()
    {
        Log::info("Directing to home page in LoginController");

        if (Auth::check()) {
              Log::info("Directing to home page ");
              $id = Auth::id();
              Log::info($id);
              return view('auth.dashboard');

        }else{

              Log::info("Directing to app(not login) page");
              return view('app');
        }

        Log::info("Done redirecting in showLoginPage");

    }

}
