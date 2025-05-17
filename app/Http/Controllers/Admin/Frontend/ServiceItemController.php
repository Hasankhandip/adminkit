<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller {

    public function index() {
        $pageTitle           = "Manage Service Item ";
        $serviceItemContents = FrontendServiceItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.serviceItem.index', compact('pageTitle', 'serviceItemContents'));
    }
    public function create() {
        $pageTitle = "Create Service Item ";
        return view('admin.frontend.serviceItem.create', compact('pageTitle'));
    }

    public function store(Request $request) {
        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);

        $frontendServiceItem              = new FrontendServiceItem();
        $frontendServiceItem->icon        = $request->icon;
        $frontendServiceItem->title       = $request->title;
        $frontendServiceItem->description = $request->description;

        $frontendServiceItem->save();
        return redirect()->route('admin.frontend.service.item.index')->with('success', 'The service item  has been created! ');
    }

    public function edit($id) {
        $pageTitle   = "Edit Service Item";
        $serviceItem = FrontendServiceItem::findOrFail($id);

        return view('admin.frontend.serviceItem.edit', compact('pageTitle', 'serviceItem'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);
        $serviceItem              = FrontendServiceItem::findOrFail($id);
        $serviceItem->icon        = $request->icon;
        $serviceItem->title       = $request->title;
        $serviceItem->description = $request->description;
        $serviceItem->save();

        return redirect()->route('admin.frontend.service.item.index')->withSuccess('Service Item has been updated');
    }

    public function delete($id) {
        $serviceItem = FrontendServiceItem::findOrFail($id);
        $serviceItem->delete();
        return back()->withSuccess('Service Item has been deleted');
    }
}
