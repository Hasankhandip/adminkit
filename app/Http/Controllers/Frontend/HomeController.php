<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendBanner;

class HomeController extends Controller {
    public function index() {
        $headTitle      = "BinaryEcom - Home";
        $bannerContents = FrontendBanner::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('headTitle', 'bannerContents'));
    }

}
