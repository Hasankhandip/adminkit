<?php
namespace App\Http\Controllers\Frontend\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegisterItem;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function index() {
        $headTitle       = "BinaryEcom - Register";
        $registerContent = RegisterItem::first();
        return view('frontend.auth.register', compact('headTitle', 'registerContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'referBy'   => 'required|string',
            'position'  => 'required|integer|in:1,2',
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'email'     => 'required|string',
            'password'  => 'required|string',
        ]);

        $registerForm            = new RegisterItem();
        $registerForm->referBy   = $request->referBy;
        $registerForm->position  = $request->position;
        $registerForm->firstname = $request->firstname;
        $registerForm->lastname  = $request->lastname;
        $registerForm->email     = $request->email;
        $registerForm->password  = $request->password;

        $registerForm->save();

        return to_route('index');
    }
}
