<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function index() {

        $headTitle = "BinaryEcom - Home";
        return view('frontend.index', compact('headTitle'));
    }

}
