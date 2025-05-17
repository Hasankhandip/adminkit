<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendAbout;
use App\Models\Frontend\FrontendBanner;
use App\Models\Frontend\FrontendService;
use App\Models\Frontend\FrontendServiceItem;

class HomeController extends Controller {
    public function index() {
        $headTitle           = "BinaryEcom - Home";
        $bannerContents      = FrontendBanner::first();
        $aboutContents       = FrontendAbout::first();
        $serviceContents     = FrontendService::first();
        $serviceItemContents = FrontendServiceItem::orderBy('id', 'asc')->get();
        return view('frontend.index', compact('headTitle', 'bannerContents', 'aboutContents', 'serviceContents', 'serviceItemContents'));
    }

}
