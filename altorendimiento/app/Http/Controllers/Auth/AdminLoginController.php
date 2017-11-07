<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 6/11/2017
 * Time: 6:47 PM
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Log;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/adminhome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function authenticated(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' =>1])) {
            // Authentication passed...

            return redirect()->intended($this->redirectPath());
        }else{
            return $this->sendFailedLoginResponse($request);

        }


    }


}