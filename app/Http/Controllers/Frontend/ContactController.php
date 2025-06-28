<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactItem;

class ContactController extends Controller {
    public function index() {
        $pageTitle          = "Contact Us";
        $contactContent     = Contact::first();
        $contactitemContent = ContactItem::first();
        return view('frontend.contact.index', compact('pageTitle', 'contactContent', 'contactitemContent'));
    }
}
