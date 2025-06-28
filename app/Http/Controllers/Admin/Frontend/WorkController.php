<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendWork;
use App\Models\Frontend\FrontendWorkItem;
use Illuminate\Http\Request;

class WorkController extends Controller {
    public function index() {
        $pageTitle   = "Work";
        $WorkContent = FrontendWork::first();
        return view('admin.frontend.work.index', compact('pageTitle', 'WorkContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendWork = FrontendWork::first();

        if (! $frontendWork) {
            $frontendWork = new FrontendWork();
        }

        $frontendWork->subtitle = $request->subtitle;
        $frontendWork->title    = $request->title;

        $frontendWork->save();
        return back()->with('success', 'The work content has been updated');
    }

    // work item start
    public function itemIndex() {
        $pageTitle        = "Manage Work Item";
        $workItemContents = FrontendWorkItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.work.item.index', compact('pageTitle', 'workItemContents'));
    }
    public function itemCreate() {
        $pageTitle = "Work";
        return view('admin.frontend.work.item.create', compact('pageTitle'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);

        $frontendWorkItem              = new FrontendWorkItem();
        $frontendWorkItem->icon        = $request->icon;
        $frontendWorkItem->title       = $request->title;
        $frontendWorkItem->description = $request->description;

        $frontendWorkItem->save();
        return redirect()->route('admin.frontend.work.item.index')->with('success', 'The work item  has been created! ');
    }

    public function itemEdit($id) {
        $pageTitle        = "Edit Work Item";
        $frontendWorkItem = FrontendWorkItem::findOrFail($id);

        return view('admin.frontend.work.item.edit', compact('pageTitle', 'frontendWorkItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);
        $frontendWorkItem              = FrontendWorkItem::findOrFail($id);
        $frontendWorkItem->icon        = $request->icon;
        $frontendWorkItem->title       = $request->title;
        $frontendWorkItem->description = $request->description;
        $frontendWorkItem->save();

        return redirect()->route('admin.frontend.work.item.index')->withSuccess('The work item has been updated');
    }

    public function itemDelete($id) {
        $frontendWorkItem = FrontendWorkItem::findOrFail($id);
        $frontendWorkItem->delete();
        return back()->withSuccess('The work item has been deleted');
    }
    // work item end
}
