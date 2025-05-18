<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendWorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller {
    public function index() {
        $pageTitle        = "Manage Work Item ";
        $workItemContents = FrontendWorkItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.workItem.index', compact('pageTitle', 'workItemContents'));
    }
    public function create() {
        $pageTitle = "Create Work Item ";
        return view('admin.frontend.workItem.create', compact('pageTitle'));
    }

    public function store(Request $request) {
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

    public function edit($id) {
        $pageTitle        = "Edit Work Item";
        $frontendWorkItem = FrontendWorkItem::findOrFail($id);

        return view('admin.frontend.workItem.edit', compact('pageTitle', 'frontendWorkItem'));
    }

    public function update(Request $request, $id) {
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

    public function delete($id) {
        $frontendWorkItem = FrontendWorkItem::findOrFail($id);
        $frontendWorkItem->delete();
        return back()->withSuccess('The work item has been deleted');
    }
}
