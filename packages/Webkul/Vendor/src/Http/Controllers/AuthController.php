<?php

namespace Webkul\Vendor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Webkul\Vendor\Repositories\VendorRepository;

class AuthController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected VendorRepository $vendorRepository)
    {
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('vendor::auth.login');
    }

    /**
     * Handle a login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->guard('vendor')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return back()
                ->withInput($request->only('email'))
                ->withError(trans('vendor::app.auth.invalid-credentials'));
        }

        return redirect()->intended(route('vendor.dashboard'));
    }

    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('vendor::auth.register');
    }

    /**
     * Handle a registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:vendors,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        $vendor = $this->vendorRepository->create($data);

        auth()->guard('vendor')->login($vendor);

        return redirect()->route('vendor.dashboard');
    }

    /**
     * Handle a logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->guard('vendor')->logout();

        return redirect()->route('vendor.login');
    }
}