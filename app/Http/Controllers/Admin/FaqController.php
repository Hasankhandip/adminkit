<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller {
    public function index() {
        $pageTitle  = "Manage Faq Content";
        $faqContent = Faq::first();
        return view('admin.faq.index', compact('pageTitle', 'faqContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
        ]);

        $faqContent = Faq::first();
        if (! $faqContent) {
            $faqContent = new Faq();
        }

        $faqContent->title = $request->title;

        $faqContent->save();
        return back()->withSuccess("The faq content has been updated");
    }

    // item start

    public function itemIndex() {
        $pageTitle       = "Manage Faq";
        $faqItemContents = FaqItem::orderBy('id', 'desc')->get();
        return view('admin.faq.item.index', compact('pageTitle', 'faqItemContents'));
    }

    public function itemCreate() {
        $pageTitle      = "Create Faq";
        $faqItemContent = new FaqItem();
        return view('admin.faq.item.create', compact('pageTitle', 'faqItemContent'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string|max:1000',
        ]);

        $faqItemContent = new FaqItem();

        $faqItemContent->title       = $request->title;
        $faqItemContent->description = $request->description;

        $faqItemContent->save();

        return redirect()->route('admin.faq.item.index')->withSuccess("Faq Item has been created !");
    }

    public function itemEdit($id) {
        $pageTitle      = "Edit Faq";
        $faqItemContent = FaqItem::findOrFail($id);
        return view('admin.faq.item.edit', compact('pageTitle', 'faqItemContent'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'required|string|max:1000',
        ]);

        $faqItemContent = FaqItem::findOrFail($id);

        $faqItemContent->title       = $request->title;
        $faqItemContent->description = $request->description;

        $faqItemContent->save();

        return redirect()->route('admin.faq.item.index')->withSuccess("Faq item has been updated !");
    }
    public function itemDelete($id) {
        $faqItemContent = FaqItem::findOrFail($id);
        $faqItemContent->delete();
        return back()->withSuccess('Faq item has been deleted');
    }
}
