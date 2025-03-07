<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function login(Request $request)
    {
        dd("hii");
        $request->validate([
            // 'email'    => 'required|email',
            'name'    => 'required|name',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
