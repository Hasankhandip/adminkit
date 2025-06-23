<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqItem;

class FaqController extends Controller {
    public function index() {
        $pageTitle      = "FAQs";
        $faqContent     = Faq::first();
        $faqItemContent = FaqItem::orderBy('id', 'desc')->get();
        return view('frontend.faq.index', compact('pageTitle', 'faqContent', 'faqItemContent'));
    }
}
