<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        $headTitle             = "BinaryEcom - Product";
        $innerTitle            = "Products";
        $products              = Product::orderBy('id', 'asc')->get();
        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.product.index', compact('headTitle', 'innerTitle', 'products', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
    public function details() {
        $headTitle             = "BinaryEcom - Product Details";
        $innerTitle            = "Product Details";
        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.product.details', compact('headTitle', 'innerTitle', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
}
