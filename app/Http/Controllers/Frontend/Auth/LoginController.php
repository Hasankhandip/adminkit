<?php
namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller {
    public function index() {
        $headTitle = "BinaryEcom - Login";
        return view('frontend.auth.login', compact('headTitle'));
    }
}
