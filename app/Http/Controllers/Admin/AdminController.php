<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function dashboard() {

        return view('admin.dashboard');
    }

    public function profile() {

        return view('admin.proffile');
    }
}
