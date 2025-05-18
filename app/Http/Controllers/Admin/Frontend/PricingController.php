<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendPricing;
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
}
