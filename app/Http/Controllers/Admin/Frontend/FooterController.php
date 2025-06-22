<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;
use Exception;
use Illuminate\Http\Request;

class FooterController extends Controller {
    public function index() {
        $pageTitle     = "Manage Pricing Plan";
        $footerContent = FrontendFooter::first();
        return view('admin.frontend.footer.index', compact('pageTitle', 'footerContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'link'  => 'required|string',
            'title' => 'required|string',
        ]);

        $frontendFooter = FrontendFooter::first();

        if (! $frontendFooter) {
            $frontendFooter = new FrontendFooter();
        }

        if ($request->hasFile('image')) {
            try {
                $folderPath            = "assets/images/frontend/footer/image/";
                $imageName             = uploadImage($request->image, $folderPath, $frontendFooter->image);
                $frontendFooter->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded");
            }
        }
        $frontendFooter->link  = $request->link;
        $frontendFooter->title = $request->title;

        $frontendFooter->save();
        return back()->with('success', 'The footer content has been updated');
    }

    // contact start
    public function contactIndex() {
        $pageTitle            = "Manage Footer Contact";
        $footerContactContent = FrontendFooterContact::first();
        return view('admin.frontend.footer.contact.index', compact('pageTitle', 'footerContactContent'));
    }

    public function contactStore(Request $request) {
        $request->validate([
            'address' => 'required|string',
            'phone'   => 'required|string',
            'email'   => 'required|string',
        ]);

        $frontendFooterContact = FrontendFooterContact::first();
        if (! $frontendFooterContact) {
            $frontendFooterContact = new FrontendFooterContact();
        }

        $frontendFooterContact->address = $request->address;
        $frontendFooterContact->phone   = $request->phone;
        $frontendFooterContact->email   = $request->email;

        $frontendFooterContact->save();

        return redirect()->route('admin.frontend.footer.contact.index')->withSuccess("Footer contact has been updated");
    }

    //social start
    public function socialIndex() {
        $pageTitle           = "Manage Footer Social";
        $footerSocialContent = FrontendFooterSocial::first();
        return view('admin.frontend.footer.social.index', compact('pageTitle', 'footerSocialContent'));
    }

    public function socialStore(Request $request) {
        $request->validate([
            'telegram_link' => 'required|string',
            'youtube_link'  => 'required|string',
            'twitter_link'  => 'required|string',
            'facebook_link' => 'required|string',
        ]);

        $footerSocial = FrontendFooterSocial::first();
        if (! $footerSocial) {
            $footerSocial = new FrontendFooterSocial();
        }

        $footerSocial->telegram_link = $request->telegram_link;
        $footerSocial->youtube_link  = $request->youtube_link;
        $footerSocial->twitter_link  = $request->twitter_link;
        $footerSocial->facebook_link = $request->facebook_link;

        $footerSocial->save();

        return redirect()->route('admin.frontend.footer.social.index')->withSuccess("Footer Social has been updated");
    }
}
