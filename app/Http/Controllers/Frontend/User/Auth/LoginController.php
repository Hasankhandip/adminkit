<?php
namespace App\Http\Controllers\Frontend\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginItem;

class LoginController extends Controller {
    public function index() {
        $headTitle    = "BinaryEcom - Login";
        $loginContent = LoginItem::first();
        return view('frontend.auth.login', compact('headTitle', 'loginContent'));
    }
}
