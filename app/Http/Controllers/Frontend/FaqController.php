<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FaqController extends Controller {
    public function index() {
        $headTitle  = "BinaryEcom - Faq";
        $innerTitle = "FAQs";
        return view('frontend.faq.index', compact('headTitle', 'innerTitle'));
    }
}
