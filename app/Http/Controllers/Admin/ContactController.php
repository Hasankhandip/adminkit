<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactItem;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        $pageTitle      = "Manage Contact Content";
        $contactContent = Contact::first();
        return view('admin.contact.index', compact('pageTitle', 'contactContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $contactContent = Contact::first();
        if (! $contactContent) {
            $contactContent = new Contact();
        }

        $contactContent->title = $request->title;

        if ($request->hasFile('image')) {
            try {
                $folderPath            = 'assets/images/contact/thumb/';
                $imageName             = uploadImage($request->image, $folderPath, $contactContent->image);
                $contactContent->image = $imageName;

            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }

        $contactContent->save();
        return back()->withSuccess("The contact content has been updated");
    }

    //item start

    public function itemIndex() {
        $pageTitle          = "Manage Contact Item";
        $contactitemContent = ContactItem::first();
        return view('admin.contact.item.index', compact('pageTitle', 'contactitemContent'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'email_name'   => 'required|email',
            'email_link'   => 'required|string',
            'phone_number' => 'required|numeric|min_digits:11',
            'address'      => 'required|string',
            'map_link'     => 'required|string',
        ]);

        $contactitemContent = ContactItem::first();
        if (! $contactitemContent) {
            $contactitemContent = new ContactItem();
        }

        $contactitemContent->email_name   = $request->email_name;
        $contactitemContent->email_link   = $request->email_link;
        $contactitemContent->phone_number = $request->phone_number;
        $contactitemContent->address      = $request->address;
        $contactitemContent->map_link     = $request->map_link;

        $contactitemContent->save();
        return back()->withSuccess("The contact Item has been updated");
    }

}
