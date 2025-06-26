<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendService;
use App\Models\Frontend\FrontendServiceItem;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    public function index() {
        $siteTitle      = "Service";
        $pageTitle      = "Manage Service Section Content";
        $serviceContent = FrontendService::first();
        return view('admin.frontend.service.index', compact('siteTitle', 'pageTitle', 'serviceContent'));
    }
    public function store(Request $request) {

        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendService = FrontendService::first();

        if (! $frontendService) {
            $frontendService = new FrontendService();
        }

        $frontendService->subtitle = $request->subtitle;
        $frontendService->title    = $request->title;

        $frontendService->save();
        return back()->with('success', 'The service content has been updated');
    }

    // service item start
    public function itemIndex() {
        $siteTitle           = "Service";
        $pageTitle           = "Manage Service Item ";
        $serviceItemContents = FrontendServiceItem::orderBy('id', 'desc')->paginate(8);
        return view('admin.frontend.service.item.index', compact('siteTitle', 'pageTitle', 'serviceItemContents'));
    }
    public function itemCreate() {
        $siteTitle = "Service";
        $pageTitle = "Create Service Item ";
        return view('admin.frontend.service.item.create', compact('siteTitle', 'pageTitle'));
    }
    public function itemStore(Request $request) {
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
    public function itemEdit($id) {
        $siteTitle           = "Service";
        $pageTitle           = "Edit Service Item";
        $frontendServiceItem = FrontendServiceItem::findOrFail($id);

        return view('admin.frontend.service.item.edit', compact('siteTitle', 'pageTitle', 'frontendServiceItem'));
    }
    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string',
            'description' => 'required|string',
        ]);
        $frontendServiceItem              = FrontendServiceItem::findOrFail($id);
        $frontendServiceItem->icon        = $request->icon;
        $frontendServiceItem->title       = $request->title;
        $frontendServiceItem->description = $request->description;
        $frontendServiceItem->save();

        return redirect()->route('admin.frontend.service.item.index')->withSuccess('Service Item has been updated');
    }

    public function itemDelete($id) {
        $frontendServiceItem = FrontendServiceItem::findOrFail($id);
        $frontendServiceItem->delete();
        return back()->withSuccess('Service Item has been deleted');
    }
    // service item end
}
