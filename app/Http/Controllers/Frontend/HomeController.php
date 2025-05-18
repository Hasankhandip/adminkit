<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendAbout;
use App\Models\Frontend\FrontendBanner;
use App\Models\Frontend\FrontendPricing;
use App\Models\Frontend\FrontendPricingItem;
use App\Models\Frontend\FrontendService;
use App\Models\Frontend\FrontendServiceItem;
use App\Models\Frontend\FrontendWork;
use App\Models\Frontend\FrontendWorkItem;

class HomeController extends Controller {
    public function index() {
        $headTitle           = "BinaryEcom - Home";
        $bannerContent       = FrontendBanner::first();
        $aboutContent        = FrontendAbout::first();
        $serviceContent      = FrontendService::first();
        $serviceItemContents = FrontendServiceItem::orderBy('id', 'asc')->get();
        $workContent         = FrontendWork::first();
        $workItemContents    = FrontendWorkItem::orderBy('id', 'asc')->get();
        $pricingContent      = FrontendPricing::first();
        $pricingContents     = FrontendPricingItem::orderBy('price')->get();
        return view('frontend.index', compact('headTitle', 'bannerContent', 'aboutContent', 'serviceContent', 'serviceItemContents', 'workContent', 'workItemContents', 'pricingContent', 'pricingContents'));
    }

}
