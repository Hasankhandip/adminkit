<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;

class FrontendBannerController extends Controller {
    public function create() {
        $pageTitle = "Manage Banner Section";
        return view('admin.manageFrontend.create', compact('pageTitle'));
    }

    public function store() {

    }
}
