<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendPricingItem;
use Illuminate\Http\Request;

class PricingItemController extends Controller {
    public function index() {
        $pageTitle       = "Manage Pricing Item";
        $pricingContents = FrontendPricingItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.pricingItem.index', compact('pageTitle', 'pricingContents'));
    }

    public function create() {
        $pageTitle = "Create Pricing Item";
        return view('admin.frontend.pricingItem.create', compact('pageTitle'));
    }

    public function store(Request $request) {
        $request->validate([
            'serial'          => 'required|numeric|unique:frontend_pricing_items,serial',
            'price'           => 'required|numeric|gt:0',
            'name'            => 'required|unique:frontend_pricing_items,name',
            'info_icon_one'   => 'required|string',
            'info_name_one'   => 'required|string',
            'info_icon_two'   => 'nullable|string',
            'info_name_two'   => 'nullable|string',
            'info_icon_three' => 'nullable|string',
            'info_name_three' => 'nullable|string',
            'button_link'     => 'required|string',
            'button_name'     => 'required|string',
        ]);

        $frontendpricingItem                  = new FrontendPricingItem();
        $frontendpricingItem->serial          = $request->serial;
        $frontendpricingItem->price           = $request->price;
        $frontendpricingItem->name            = $request->name;
        $frontendpricingItem->info_icon_one   = $request->info_icon_one;
        $frontendpricingItem->info_name_one   = $request->info_name_one;
        $frontendpricingItem->info_icon_two   = $request->info_icon_two;
        $frontendpricingItem->info_name_two   = $request->info_name_two;
        $frontendpricingItem->info_icon_three = $request->info_icon_three;
        $frontendpricingItem->info_name_three = $request->info_name_three;
        $frontendpricingItem->button_link     = $request->button_link;
        $frontendpricingItem->button_name     = $request->button_name;
        $frontendpricingItem->save();

        return redirect()->route('admin.frontend.pricing.item.index')->withSuccess("Pricing item has been created !");
    }

    public function edit($id) {
        $pageTitle           = "Edit Pricing Item";
        $frontendpricingItem = FrontendPricingItem::findOrFail($id);
        return view('admin.frontend.pricingItem.edit', compact('pageTitle', 'frontendpricingItem'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'serial'          => 'required|numeric|unique:frontend_pricing_items,serial,' . $id,
            'price'           => 'required|numeric|gt:0',
            'name'            => 'required|unique:frontend_pricing_items,name,' . $id,
            'info_icon_one'   => 'required|string',
            'info_name_one'   => 'required|string',
            'info_icon_two'   => 'nullable|string',
            'info_name_two'   => 'nullable|string',
            'info_icon_three' => 'nullable|string',
            'info_name_three' => 'nullable|string',
            'button_link'     => 'required|string',
            'button_name'     => 'required|string',
        ]);

        $frontendpricingItem                  = FrontendPricingItem::findOrFail($id);
        $frontendpricingItem->serial          = $request->serial;
        $frontendpricingItem->price           = $request->price;
        $frontendpricingItem->name            = $request->name;
        $frontendpricingItem->info_icon_one   = $request->info_icon_one;
        $frontendpricingItem->info_name_one   = $request->info_name_one;
        $frontendpricingItem->info_icon_two   = $request->info_icon_two;
        $frontendpricingItem->info_name_two   = $request->info_name_two;
        $frontendpricingItem->info_icon_three = $request->info_icon_three;
        $frontendpricingItem->info_name_three = $request->info_name_three;
        $frontendpricingItem->button_link     = $request->button_link;
        $frontendpricingItem->button_name     = $request->button_name;
        $frontendpricingItem->save();

        return redirect()->route('admin.frontend.pricing.item.index')->withSuccess('The pricing item has been updated');
    }
    public function delete($id) {
        $frontendpricingItem = FrontendPricingItem::findOrFail($id);
        $frontendpricingItem->delete();
        return back()->withSuccess('The pricing item has been deleted');
    }
}
