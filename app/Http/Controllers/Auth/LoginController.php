<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('auth:api');
    }

    public function login(Request $request) {
        //$this->validateLogin($request);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = $this->guard()->user();
            $user->generateToken();
           // Auth::guard()->login($user);
            return response()->json([
                'data' => $user->toArray(),
            ]);
            // return redirect( RouteServiceProvider::HOME)->with($this->response()->json([
            //     'data' => $user->toArray(),
            // ]));
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request) {
        $user = Auth::guard('api')->user();
        echo $user;
        if ($user) {
            $user->api_token = null;
            $user->save();
         //   Auth::logout();
            return  response()->json(['data' => 'User logged out.'], 200);
        }
        return response()->json([
            'data' => $user->toArray(),
        ]); 
    }


}
