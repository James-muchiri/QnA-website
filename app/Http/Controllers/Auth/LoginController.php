<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    public function signIn(Request $request)
    {
        // dd(url()->current());
        // dd($request);
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|min:3'
           ]);

        $details = [ 'email' => $request->email , 'password' => $request->password];
           if (Auth::guard('adminauth')->attempt($details)) {
            return redirect()->route('admin');
        }
           else{
                return redirect()->back()->withInput()->withErrors(['password' => 'password does not exist',
                                                                'email' => 'email does not exist']);
           }
    }

    public function signOut(Request $request) {
        Auth::guard('adminauth')->logout();

        return redirect()->route('admin');
    }
}
