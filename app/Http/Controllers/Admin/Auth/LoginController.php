<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginItem;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function login() {

        $pageTitle    = "Manage Login Content";
        $loginContent = LoginItem::first();

        return view('admin.auth.login', compact('pageTitle', 'loginContent'));
    }

    public function loginAttempt(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $attempt = auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($attempt) {
            return to_route('admin.dashboard');
        }

        return back()->withErrors("The credentails dosn't match our records");

    }
}
