<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index() {
        return view('site.pages.profile');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|email|max:255',
            'phone'      => 'required|string|max:15',
            'address'    => 'required|string'
        ]);

        $user = auth()->guard('customer')->user();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->save();

        return redirect(route('profile'))->with(_sessionmessage());
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function updatePassword(Request $request) {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8|same:password'
        ]);

        $user = auth()->guard('customer')->user();

        $user->password = Hash::make($request->get('password'));

        $user->save();

        return redirect(route('profile'))->with(_sessionmessage());
    }
}
