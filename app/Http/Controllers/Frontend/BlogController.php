<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendBlogItem;

class BlogController extends Controller {
    public function index() {
        $pageTitle        = "Blog";
        $blogItemContents = FrontendBlogItem::orderBy('id', 'asc')->paginate(6);
        return view('frontend.blog.index', compact('pageTitle', 'blogItemContents'));
    }
    public function details() {
        $pageTitle = "Blog Details";
        return view('frontend.blog.details', compact('pageTitle'));
    }
}
