<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function dashboard() {
        $siteTitle = "Dashboard";
        return view('admin.dashboard', compact('siteTitle'));
    }

    public function login(Request $request) {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

    }
}
