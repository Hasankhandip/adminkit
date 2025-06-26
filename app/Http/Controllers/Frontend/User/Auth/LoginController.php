<?php
namespace App\Http\Controllers\Frontend\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginItem;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index() {
        $siteTitle    = "Login";
        $pageTitle    = "Login";
        $loginContent = LoginItem::first();
        return view('frontend.auth.login', compact('siteTitle', 'pageTitle', 'loginContent'));
    }

    public function loginAttempt(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $attempt = auth()->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($attempt) {
            return to_route('index');
        }
        return back()->withErrors("The credentails dosn't match our records");

    }
}
