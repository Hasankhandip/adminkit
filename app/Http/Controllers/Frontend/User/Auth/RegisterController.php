<?php
namespace App\Http\Controllers\Frontend\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegisterItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function index() {
        $headTitle       = "BinaryEcom - Register";
        $registerContent = RegisterItem::first();
        return view('frontend.auth.register', compact('headTitle', 'registerContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'email'     => 'required|string',
            'password'  => 'required|string',
        ]);

        $user            = new User();
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->save();

        Auth::guard('web')->login($user);

        if (Auth::guard('web')->check()) {
            return to_route('index');
        }
        return to_route('login.index');
    }
}
