<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        $siteTitle = "Footer";
        $pageTitle = "Home";
        return view('frontend.index', compact('siteTitle', 'pageTitle'));
    }

}
