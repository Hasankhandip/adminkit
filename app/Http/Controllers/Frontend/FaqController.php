<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;

class FaqController extends Controller {
    public function index() {
        $headTitle             = "BinaryEcom - Faq";
        $innerTitle            = "FAQs";
        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.faq.index', compact('headTitle', 'innerTitle', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
}
