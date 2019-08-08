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
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AppController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');

        // $this->middleware('guest')->except('logout');
    }

    // public function __construct()
    // {
    //     // $this->middleware('auth');
    // }

    // public function username()
    // {
    //     return 'username';
    // }

    public function showHomePage()
    {

        if (auth::check()) {
            Log::info("auth::check passes");
            return view('auth.dashboard');

        }else{

            Log::info("auth::check not pass");
            return view('app');
        }

    }

    public function logoutUser()
    {

          $id = Auth::id();
          Log::info($id);
          Auth::logout();
          Log::info("Logging out");
          return redirect('/');

    }
}
