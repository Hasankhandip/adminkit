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
        return view('admin.manageFrontend.serviceItem.create', compact('pageTitle'));
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
        return redirect()->route('admin.frontendServiceItem.index')->with('success', 'Your Category has been created! ');
    }
}
