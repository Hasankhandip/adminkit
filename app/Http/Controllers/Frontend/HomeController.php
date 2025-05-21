<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendAbout;
use App\Models\Frontend\FrontendBanner;
use App\Models\Frontend\FrontendBlog;
use App\Models\Frontend\FrontendBlogItem;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;
use App\Models\Frontend\FrontendPricing;
use App\Models\Frontend\FrontendPricingItem;
use App\Models\Frontend\FrontendProduct;
use App\Models\Frontend\FrontendProductItem;
use App\Models\Frontend\FrontendReffer;
use App\Models\Frontend\FrontendService;
use App\Models\Frontend\FrontendServiceItem;
use App\Models\Frontend\FrontendTeam;
use App\Models\Frontend\FrontendTeamItem;
use App\Models\Frontend\FrontendTestimonial;
use App\Models\Frontend\FrontendTestimonialClient;
use App\Models\Frontend\FrontendWork;
use App\Models\Frontend\FrontendWorkItem;

class HomeController extends Controller {
    public function index() {
        $headTitle                 = "BinaryEcom - Home";
        $bannerContent             = FrontendBanner::first();
        $aboutContent              = FrontendAbout::first();
        $serviceContent            = FrontendService::first();
        $serviceItemContents       = FrontendServiceItem::orderBy('id', 'asc')->get();
        $workContent               = FrontendWork::first();
        $workItemContents          = FrontendWorkItem::orderBy('id', 'asc')->get();
        $pricingContent            = FrontendPricing::first();
        $pricingContents           = FrontendPricingItem::orderBy('price')->get();
        $refferContent             = FrontendReffer::first();
        $teamContent               = FrontendTeam::first();
        $teamItemContents          = FrontendTeamItem::orderBy('id', 'asc')->get();
        $productContent            = FrontendProduct::first();
        $productItemContents       = FrontendProductItem::orderBy('price')->get();
        $testimonialContent        = FrontendTestimonial::first();
        $testimonialClientContents = FrontendTestimonialClient::orderBy('id', 'asc')->get();
        $blogContent               = FrontendBlog::first();
        $blogItemContents          = FrontendBlogItem::orderBy('id', 'asc')->get();
        $footerContent             = FrontendFooter::first();
        $footerContactContents     = FrontendFooterContact::first();
        $footerSocial              = FrontendFooterSocial::first();
        return view('frontend.index', compact('headTitle', 'bannerContent', 'aboutContent', 'serviceContent', 'serviceItemContents', 'workContent', 'workItemContents', 'pricingContent', 'pricingContents', 'refferContent', 'teamContent', 'teamItemContents', 'productContent', 'productItemContents', 'testimonialContent', 'testimonialClientContents', 'blogContent', 'blogItemContents', 'footerContent', 'footerContactContents', 'footerSocial'));
    }

}
