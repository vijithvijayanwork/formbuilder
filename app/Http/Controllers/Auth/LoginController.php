<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\LoginRequest;
use Session;
use Redirect;
use Auth;

class LoginController extends BaseController {
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

use AuthorizesRequests,
    DispatchesJobs,
    ValidatesRequests;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function userLogin(LoginRequest $request) {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

}
