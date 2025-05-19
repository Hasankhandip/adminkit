<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendPricing;
use App\Models\Frontend\FrontendPricingItem;
use Illuminate\Http\Request;

class PricingController extends Controller {
    public function index() {
        $pageTitle      = "Manage Pricing Plan";
        $pricingContent = FrontendPricing::first();
        return view('admin.frontend.pricing.index', compact('pageTitle', 'pricingContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendPricing = FrontendPricing::first();

        if (! $frontendPricing) {
            $frontendPricing = new FrontendPricing();
        }

        $frontendPricing->subtitle = $request->subtitle;
        $frontendPricing->title    = $request->title;

        $frontendPricing->save();
        return back()->with('success', 'The pricing content has been updated');
    }

    // item start
    public function itemIndex() {
        $pageTitle       = "Manage Pricing Item";
        $pricingContents = FrontendPricingItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.pricing.item.index', compact('pageTitle', 'pricingContents'));
    }

    public function itemCreate() {
        $pageTitle = "Create Pricing Item";
        return view('admin.frontend.pricing.item.create', compact('pageTitle'));
    }

    public function itemStore(Request $request) {
        $request->validate([
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

        $frontendPricingItem                  = new FrontendPricingItem();
        $frontendPricingItem->price           = $request->price;
        $frontendPricingItem->name            = $request->name;
        $frontendPricingItem->info_icon_one   = $request->info_icon_one;
        $frontendPricingItem->info_name_one   = $request->info_name_one;
        $frontendPricingItem->info_icon_two   = $request->info_icon_two;
        $frontendPricingItem->info_name_two   = $request->info_name_two;
        $frontendPricingItem->info_icon_three = $request->info_icon_three;
        $frontendPricingItem->info_name_three = $request->info_name_three;
        $frontendPricingItem->button_link     = $request->button_link;
        $frontendPricingItem->button_name     = $request->button_name;
        $frontendPricingItem->save();

        return redirect()->route('admin.frontend.pricing.item.index')->withSuccess("Pricing item has been created !");
    }

    public function itemEdit($id) {
        $pageTitle           = "Edit Pricing Item";
        $frontendPricingItem = FrontendPricingItem::findOrFail($id);
        return view('admin.frontend.pricing.item.edit', compact('pageTitle', 'frontendPricingItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
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

        $frontendPricingItem                  = FrontendPricingItem::findOrFail($id);
        $frontendPricingItem->price           = $request->price;
        $frontendPricingItem->name            = $request->name;
        $frontendPricingItem->info_icon_one   = $request->info_icon_one;
        $frontendPricingItem->info_name_one   = $request->info_name_one;
        $frontendPricingItem->info_icon_two   = $request->info_icon_two;
        $frontendPricingItem->info_name_two   = $request->info_name_two;
        $frontendPricingItem->info_icon_three = $request->info_icon_three;
        $frontendPricingItem->info_name_three = $request->info_name_three;
        $frontendPricingItem->button_link     = $request->button_link;
        $frontendPricingItem->button_name     = $request->button_name;
        $frontendPricingItem->save();

        return redirect()->route('admin.frontend.pricing.item.index')->withSuccess('The pricing item has been updated');
    }
    public function itemDelete($id) {
        $frontendPricingItem = FrontendPricingItem::findOrFail($id);
        $frontendPricingItem->delete();
        return back()->withSuccess('The pricing item has been deleted');
    }
    // item end
}
