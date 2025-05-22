<?php
namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegisterItem;

class RegisterController extends Controller {
    public function index() {
        $headTitle       = "BinaryEcom - Register";
        $registerContent = RegisterItem::first();
        return view('frontend.auth.register', compact('headTitle', 'registerContent'));
    }
}
