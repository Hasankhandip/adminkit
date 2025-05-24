<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Frontend\FrontendFooter;
use App\Models\Frontend\FrontendFooterContact;
use App\Models\Frontend\FrontendFooterSocial;

class BlogController extends Controller {
    public function index() {
        $headTitle  = "BinaryEcom - Blog";
        $innerTitle = "Blogs";

        $blogContents = Blog::orderBy('id', 'asc')->get();

        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.blog.index', compact('headTitle', 'innerTitle', 'blogContents', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
    public function details() {
        $headTitle             = "BinaryEcom - Blog Details";
        $innerTitle            = "Blog Details";
        $footerContent         = FrontendFooter::first();
        $footerContactContents = FrontendFooterContact::first();
        $footerSocial          = FrontendFooterSocial::first();
        return view('frontend.blog.details', compact('headTitle', 'innerTitle', 'footerContent', 'footerContactContents', 'footerSocial'));
    }
}
