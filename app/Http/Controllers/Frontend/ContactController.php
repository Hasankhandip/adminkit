<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class ContactController extends Controller {
    public function index() {
        $headTitle  = "BinaryEcom - Contact";
        $innerTitle = "Contact Us";
        return view('frontend.contact.index', compact('headTitle', 'innerTitle'));
    }
}
