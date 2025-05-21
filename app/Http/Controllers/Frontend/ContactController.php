<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;

class ContactController extends Controller {
    public function index() {
        $headTitle             = "BinaryEcom - Contact";
        $innerTitle            = "Contact Us";
        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.contact.index', compact('headTitle', 'innerTitle', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
}
