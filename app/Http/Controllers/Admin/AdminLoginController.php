<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    /**
     * Check is admin correct login
     *
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
    * Get the failed login response instance.
    *
    * @param  Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = new \Illuminate\Support\MessageBag();
        $errors->add('email', 'Your custom error message!');
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors($errors);
    }
}
