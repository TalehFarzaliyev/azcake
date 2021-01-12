<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
    }

    /**
     * Custom login
     * @return Factory|View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * @return Application|Factory|View
     */
    public function showSiteLoginForm() {
        return view('site.pages.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginSite(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (auth()->guard('customer')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], $request->get('remember'))) {

            return redirect()->intended(route('home'));
        }
        return back()->with(_sessionmessage());
    }

    /**
     * @return RedirectResponse
     */
    public function logout() {

        auth()->guard('customer')->logout();

        return back();
    }
}
