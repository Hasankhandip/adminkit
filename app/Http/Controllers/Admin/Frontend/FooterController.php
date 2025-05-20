<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterItem;
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
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

    // item start
    public function itemIndex() {
        $pageTitle          = "Manage Footer Item";
        $footerItemContents = FrontendFooterItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.footer.item.index', compact('pageTitle', 'footerItemContents'));
    }
    public function itemCreate() {
        $pageTitle         = "Create Footer Item";
        $footerItemContent = new FrontendFooterItem();
        return view('admin.frontend.footer.item.create', compact('pageTitle', 'footerItemContent'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'title'       => 'required|string',
            'footer_name' => 'required|string',
            'footer_link' => 'required|string',
        ]);

        $frontendFooterItem = new FrontendFooterItem();

        $frontendFooterItem->title       = $request->title;
        $frontendFooterItem->footer_name = $request->footer_name;
        $frontendFooterItem->footer_link = $request->footer_link;

        $frontendFooterItem->save();

        return redirect()->route('admin.frontend.footer.item.index')->withSuccess("Footer item has been created !");
    }

    public function itemEdit($id) {
        $pageTitle          = "Edit Footer Item";
        $frontendFooterItem = FrontendFooterItem::findOrFail($id);
        return view('admin.frontend.footer.item.edit', compact('pageTitle', 'frontendFooterItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'title'       => 'required|string',
            'footer_name' => 'required|string',
            'footer_link' => 'required|string',
        ]);

        $frontendFooterItem = FrontendFooterItem::findOrFail($id);

        $frontendFooterItem->title       = $request->title;
        $frontendFooterItem->footer_name = $request->footer_name;
        $frontendFooterItem->footer_link = $request->footer_link;
        $frontendFooterItem->save();

        return redirect()->route('admin.frontend.footer.item.index')->withSuccess("Footer has been updated !");
    }

    public function itemDelete($id) {
        $frontendFooterItem = FrontendFooterItem::findOrFail($id);
        $frontendFooterItem->delete();
        return back()->withSuccess('The footer item has been deleted');
    }
}
