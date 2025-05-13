<?php
namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;

class RegisterController extends Controller {
    public function index() {
        $headTitle = "BinaryEcom - Register";
        return view('frontend.auth.register', compact('headTitle'));
    }
}
